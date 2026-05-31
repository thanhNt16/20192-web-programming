pub mod error;
pub mod fs_ops;
pub mod install;
pub mod link;
pub mod note;
pub mod plan;
pub mod setup;
pub mod vault;
pub mod workflow;

pub use error::KbError;
pub use plan::{Action, ConflictDetail, Finding, Ownership, Plan, Report, Severity, SkipReason};
