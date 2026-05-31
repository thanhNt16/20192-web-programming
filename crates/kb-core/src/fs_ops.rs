use crate::error::KbError;
use crate::plan::{Action, ActionOutcome, OutcomeStatus, Plan, Report};
use camino::Utf8Path;
use std::fs;

#[derive(Debug, Clone, Default)]
pub struct ApplyOptions {
    pub dry_run: bool,
    pub force: bool,
}

pub fn apply(plan: Plan, options: ApplyOptions) -> Result<Report, KbError> {
    let mut outcomes = Vec::new();

    for action in plan.actions {
        let status = match &action {
            Action::CreateDir { path } => {
                if options.dry_run {
                    OutcomeStatus::WouldApply
                } else {
                    fs::create_dir_all(path)?;
                    OutcomeStatus::Applied
                }
            }
            Action::WriteFile { path, contents, .. } | Action::UpdateFile { path, contents, .. } => {
                if options.dry_run {
                    OutcomeStatus::WouldApply
                } else {
                    atomic_write(path, contents)?;
                    OutcomeStatus::Applied
                }
            }
            Action::DeleteFile { path, .. } => {
                if options.dry_run {
                    OutcomeStatus::WouldApply
                } else if options.force {
                    if path.exists() {
                        fs::remove_file(path)?;
                    }
                    OutcomeStatus::Applied
                } else {
                    OutcomeStatus::Conflict
                }
            }
            Action::Skip { .. } => OutcomeStatus::Skipped,
            Action::Conflict { .. } => OutcomeStatus::Conflict,
        };
        outcomes.push(ActionOutcome { action, status });
    }

    Ok(Report::from_outcomes(outcomes, Vec::new()))
}

fn atomic_write(path: &Utf8Path, contents: &[u8]) -> Result<(), KbError> {
    if let Some(parent) = path.parent() {
        fs::create_dir_all(parent)?;
    }
    let tmp = path.with_extension("tmp");
    fs::write(&tmp, contents)?;
    fs::rename(tmp, path)?;
    Ok(())
}
