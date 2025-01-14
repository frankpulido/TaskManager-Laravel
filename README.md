# THE PROJECT


# GIT FLOW

1) Initialize :

git flow init

2) Feature Branches

- Start a Feature:
git flow feature start <feature-name>
Creates and switches to a new branch feature/<feature-name> based on develop.

TAGGING :
We can tag the feature branch each time we recreate it, e.g. :
git flow feature start tdd
git tag tdd-v1

- Finish a Feature:
git flow feature finish <feature-name>
Merges the feature branch into develop and deletes the feature branch.

- Publish a Feature (Push to Remote):
git flow feature publish <feature-name>
(We WON'T use this)

- Pull a Feature (From Remote):
git flow feature pull origin <feature-name>
(We WON'T use this)

- DIRECTIVE :
Finish and merge a feature branch into develop before starting another to maintain a clean workflow and minimize conflicts.
Then push develop to remote

Developers cloning the repository from GitHub could see the full history (including feature branches) using this command :

git log --oneline --decorate --graph

3) Release Branches

- Start a Release:
git flow release start <release-version>
Creates release/<release-version> based on develop.

- Finish a Release:
git flow release finish <release-version>
Merges the release into main and develop.
Tags the release version in main.

- Publish a Release:
git flow release publish <release-version>

4) Hotfix Branches

- Start a Hotfix
git flow hotfix start <hotfix-name>
Creates hotfix/<hotfix-name> based on main.

- Finish a Hotfix:
git flow hotfix finish <hotfix-name>
Merges the hotfix into main and develop.
Tags the hotfix version in main.

5) Support Branches
git flow support start <support-name>
Creates support/<support-name> for long-term maintenance.

6) Other Useful Commands

- List All Features:
git flow feature list

- List All Releases:
git flow release list

- List All Hotfixes:
git flow hotfix list

- Delete a Local or Remote Feature:
git flow feature delete <feature-name>
