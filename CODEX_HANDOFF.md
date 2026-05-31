# Codex Handoff: kb-cli LLM-Wiki MVP

Branch: `feature/kb-cli-llm-wiki-mvp`

This branch is intended to become a clean Rust workspace for `kb-cli`.

## Goal

Implement a deterministic local-first LLM-Wiki CLI and skills kit.

Core loop:

```text
Capture raw truth -> Compile durable wiki -> Query before coding -> Promote useful outputs -> Lint for trust -> Dream for compounding memory
```

## Safety

- Work only on this branch.
- Do not modify the default branch.
- Keep cleanup branch-local.
- Preserve this handoff file until the MVP scaffold is committed.
- `kb-cli` must not call LLM APIs.
- Agent reasoning belongs in skills and manifests.
- `kb-cli` only validates, plans, applies file operations, and reports.

## MVP scope

Build only:

1. Rust workspace
2. `crates/kb-core`
3. `crates/kb-cli`
4. `Plan`, `Action`, `Report`
5. `fs_ops::apply` with dry-run
6. `init`
7. `link`
8. `status`
9. `add`
10. `list`
11. `show`
12. `install --agent claude-code`
13. `setup --profile productivity`
14. `plugin list`
15. `plugin doctor`
16. `workflow validate`
17. `assets/workflow-bundles/kb-workflow-bundle`

Do not build yet:

- facts engine
- dream engine implementation
- graph ingestion
- Cursor provider
- Codex provider
- scheduling
- daemon
- SQLite
- MCP server

## Repository target layout

```text
kb-cli/
├── Cargo.toml
├── crates/
│   ├── kb-core/
│   │   └── src/
│   │       ├── error.rs
│   │       ├── plan.rs
│   │       ├── fs_ops.rs
│   │       ├── vault.rs
│   │       ├── link.rs
│   │       ├── note.rs
│   │       ├── install.rs
│   │       ├── setup.rs
│   │       ├── workflow.rs
│   │       └── lib.rs
│   └── kb-cli/
│       └── src/
│           └── main.rs
├── assets/
│   └── workflow-bundles/
│       └── kb-workflow-bundle/
├── tests/
├── installer/
└── npm/
```

## Rust dependencies

Use:

- clap
- serde
- serde_json
- serde_yaml
- thiserror
- anyhow
- camino
- walkdir
- sha2
- hex
- chrono
- tempfile
- include_dir

## Core contract

Every mutating command must compile a `Plan` first.

```rust
pub struct Plan {
    pub actions: Vec<Action>,
}

pub enum Action {
    CreateDir { path: Utf8PathBuf },
    WriteFile { path: Utf8PathBuf, contents: Vec<u8>, ownership: Ownership },
    UpdateFile { path: Utf8PathBuf, contents: Vec<u8>, ownership: Ownership },
    DeleteFile { path: Utf8PathBuf, ownership: Ownership, backup: bool },
    Skip { path: Utf8PathBuf, reason: SkipReason },
    Conflict { path: Utf8PathBuf, detail: ConflictDetail },
}
```

`fs_ops::apply(plan, options)` must be the only mutation path.

## Vault scaffold

`kb-cli init` should create:

```text
vault/
├── raw/
│   ├── papers/
│   ├── meetings/
│   ├── specs/
│   ├── sessions/
│   ├── chats/
│   ├── code/
│   ├── diagrams/
│   ├── dbt-models/
│   ├── dags/
│   └── sql/
├── wiki/
│   ├── index.md
│   ├── log.md
│   ├── concepts/
│   ├── entities/
│   ├── decisions/
│   ├── systems/
│   ├── workflows/
│   ├── troubleshooting/
│   ├── data-lineage/
│   ├── metrics/
│   └── synthesis/
├── memory/
│   ├── MEMORY.md
│   ├── CRITICAL_FACTS.md
│   ├── hot.md
│   ├── active_epics.md
│   └── open_questions.md
├── manifests/
├── reports/
│   ├── lint/
│   ├── dream/
│   └── health/
├── projects/
├── templates/
├── .kb/
├── kb.config.yml
├── CLAUDE.md
└── AGENTS.md
```

## Workflow bundle skills

Create `assets/workflow-bundles/kb-workflow-bundle/skills/*/SKILL.md` for:

- `kb:onboard`
- `kb:daily-start`
- `kb:choose-method`
- `kb:repo-understand`
- `kb:graph-workflow`
- `kb:execute-gsd`
- `kb:remember-session`
- `kb:daily-close`
- `kb:maintain`
- `kb:promote`
- `kb:dream`

## Acceptance tests

- `cargo test` passes
- `kb-cli init --dry-run` does not write
- `kb-cli init` is idempotent
- `kb-cli link` is idempotent
- `kb-cli add note` creates Markdown with frontmatter
- `kb-cli list --unprocessed` finds raw captures
- `kb-cli install --agent claude-code` writes `.claude` assets
- install re-run is idempotent
- user-modified installed file becomes conflict
- `kb-cli setup --dry-run` shows init + link + install actions
- `kb-cli workflow validate` validates skill frontmatter

## Suggested commits

1. `chore: create rust workspace`
2. `feat(core): add plan report and fs apply engine`
3. `feat(vault): add init link and status`
4. `feat(notes): add note capture list and show`
5. `feat(install): add claude-code provider and registry`
6. `feat(setup): add productivity setup profile`
7. `feat(workflow): add kb workflow bundle assets`
8. `test: add mvp integration coverage`
