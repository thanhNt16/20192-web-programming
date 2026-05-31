#[derive(Debug, thiserror::Error)]
pub enum KbError {
    #[error("io error: {0}")]
    Io(#[from] std::io::Error),

    #[error("yaml error: {0}")]
    Yaml(#[from] serde_yaml::Error),

    #[error("json error: {0}")]
    Json(#[from] serde_json::Error),

    #[error("path error: {0}")]
    Path(String),

    #[error("config error: {0}")]
    Config(String),

    #[error("validation error: {0}")]
    Validation(String),

    #[error("install conflict: {0}")]
    InstallConflict(String),
}
