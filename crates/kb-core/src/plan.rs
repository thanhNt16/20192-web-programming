use camino::Utf8PathBuf;
use serde::{Deserialize, Serialize};

#[derive(Debug, Clone, Default, Serialize, Deserialize)]
pub struct Plan {
    pub actions: Vec<Action>,
}

impl Plan {
    pub fn new() -> Self {
        Self { actions: Vec::new() }
    }

    pub fn push(&mut self, action: Action) {
        self.actions.push(action);
    }

    pub fn extend(&mut self, other: Plan) {
        self.actions.extend(other.actions);
    }
}

#[derive(Debug, Clone, Serialize, Deserialize)]
#[serde(tag = "kind")]
pub enum Action {
    CreateDir { path: Utf8PathBuf },
    WriteFile { path: Utf8PathBuf, contents: Vec<u8>, ownership: Ownership },
    UpdateFile { path: Utf8PathBuf, contents: Vec<u8>, ownership: Ownership },
    DeleteFile { path: Utf8PathBuf, ownership: Ownership, backup: bool },
    Skip { path: Utf8PathBuf, reason: SkipReason },
    Conflict { path: Utf8PathBuf, detail: ConflictDetail },
}

#[derive(Debug, Clone, Serialize, Deserialize, PartialEq, Eq)]
pub enum Ownership {
    KbOwned,
    User,
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub enum SkipReason {
    AlreadyExists,
    AlreadyUpToDate,
    NotApplicable,
    UnsupportedProvider,
    BlockedByPolicy,
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub struct ConflictDetail {
    pub message: String,
    pub expected_checksum: Option<String>,
    pub actual_checksum: Option<String>,
}

#[derive(Debug, Clone, Default, Serialize, Deserialize)]
pub struct Report {
    pub outcomes: Vec<ActionOutcome>,
    pub findings: Vec<Finding>,
    pub summary: Summary,
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub struct ActionOutcome {
    pub action: Action,
    pub status: OutcomeStatus,
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub enum OutcomeStatus {
    Applied,
    WouldApply,
    Skipped,
    Conflict,
    Failed { message: String },
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub struct Finding {
    pub severity: Severity,
    pub rule: String,
    pub path: Utf8PathBuf,
    pub message: String,
    pub fixable: bool,
}

#[derive(Debug, Clone, Serialize, Deserialize)]
pub enum Severity {
    Error,
    Warning,
    Info,
}

#[derive(Debug, Clone, Default, Serialize, Deserialize)]
pub struct Summary {
    pub created: usize,
    pub updated: usize,
    pub deleted: usize,
    pub skipped: usize,
    pub conflicts: usize,
    pub errors: usize,
}

impl Report {
    pub fn from_outcomes(outcomes: Vec<ActionOutcome>, findings: Vec<Finding>) -> Self {
        let mut summary = Summary::default();
        for outcome in &outcomes {
            match (&outcome.action, &outcome.status) {
                (Action::CreateDir { .. } | Action::WriteFile { .. }, OutcomeStatus::Applied | OutcomeStatus::WouldApply) => summary.created += 1,
                (Action::UpdateFile { .. }, OutcomeStatus::Applied | OutcomeStatus::WouldApply) => summary.updated += 1,
                (Action::DeleteFile { .. }, OutcomeStatus::Applied | OutcomeStatus::WouldApply) => summary.deleted += 1,
                (_, OutcomeStatus::Skipped) => summary.skipped += 1,
                (_, OutcomeStatus::Conflict) => summary.conflicts += 1,
                (_, OutcomeStatus::Failed { .. }) => summary.errors += 1,
                _ => {}
            }
        }
        Self { outcomes, findings, summary }
    }
}
