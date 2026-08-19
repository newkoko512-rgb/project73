---
name: grill-with-docs
description: A relentless interview to sharpen a plan or design, which also creates docs (ADR's and glossary) as we go.
disable-model-invocation: true
---

# Grill with Docs

Orchestrates two passes to turn a vague idea into a build-ready design with
docs recorded along the way.

1. Call the Skill tool for **grilling**. Conduct the one-question-at-a-time
   interview against the user's request. As each question is settled, record
   the decision as an ADR entry (context, decision, rationale) in
   `docs/adr/`. Add every defined term to a running glossary in
   `docs/glossary.md`. Keep going until the grilling "definition of done" is
   met.

2. Call the Skill tool for **domain-modeling**. Given the sharpened spec,
   extract entities, value objects, relationships, invariants, and the
   persistence map. Record the result in `docs/domain-model.md` (entity list,
   relationships, invariants, persistence map, glossary).

3. Close the loop: confirm with the user that the docs match their intent
   before any implementation starts.

Use when the user has a feature, project, or design they want pinned down and
documented before (or while) building. Requires a scratch `docs/` area in the
project (create it if missing).
