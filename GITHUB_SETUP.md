# 🚀 GitHub Repository Setup Instructions

## Prerequisites
- GitHub account created
- Git installed locally
- SSH key configured (recommended) or personal access token

---

## 📋 Step 1: Create GitHub Repository

1. Go to https://github.com/zainabk-design
2. Click **"New"** to create a new repository
3. **Repository name**: `QuickPOS` (or similar)
4. **Description**: "QuickPOS Landing Page - Modern SaaS Platform"
5. **Visibility**: Public (for portfolio) or Private (for production)
6. **DO NOT** initialize with:
   - README
   - .gitignore
   - License
7. Click **"Create repository"**

---

## 🔗 Step 2: Add Remote to Local Repository

Run these commands in your SPM folder:

```bash
# Copy the repository URL from GitHub (HTTPS or SSH)
# Then run:
git remote add origin https://github.com/zainabk-design/QuickPOS.git

# Verify remote was added
git remote -v
```

**Expected Output**:
```
origin  https://github.com/zainabk-design/QuickPOS.git (fetch)
origin  https://github.com/zainabk-design/QuickPOS.git (push)
```

---

## 📤 Step 3: Push All Branches to GitHub

```bash
# Push main branch
git push -u origin main

# Push develop branch
git push -u origin develop

# Push all feature branches
git push -u origin feature/SCRUM-11-core-ui
git push -u origin feature/SCRUM-17-pricing-testimonials
git push -u origin feature/SCRUM-18-contact-form
git push -u origin bugfix/SCRUM-40-mobile

# Verify all branches are on GitHub
git branch -r
```

**Expected Output**:
```
origin/HEAD -> origin/main
origin/develop
origin/main
origin/feature/SCRUM-11-core-ui
origin/feature/SCRUM-17-pricing-testimonials
origin/feature/SCRUM-18-contact-form
origin/bugfix/SCRUM-40-mobile
```

---

## 🔐 Step 4: Configure Branch Protection Rules

On GitHub repository page:

1. Go to **Settings** → **Branches**
2. Click **"Add rule"** under "Branch protection rules"
3. **Pattern name**: `main`
4. Enable:
   - [x] Require pull request reviews before merging (1 review)
   - [x] Require status checks to pass
   - [x] Require branches to be up to date
   - [x] Include administrators
4. Click **"Create"**

Repeat for `develop` branch:
1. Add new rule with pattern: `develop`
2. Same settings as above

---

## 👥 Step 5: Add Collaborators (Optional)

1. Go to **Settings** → **Collaborators**
2. Click **"Add people"**
3. Search for team members by GitHub username
4. Assign role: **Maintain** or **Admin**

---

## 🏷️ Step 6: Configure Jira Integration (If Using)

1. Go to **Settings** → **Integrations & services**
2. Add **Jira** integration:
   - Jira instance URL
   - Jira project key: `SCRUM`
   - API credentials
3. Enable automatic linking of commits with Jira tickets

---

## ✅ Step 7: Verify Setup

Run this command to verify everything is connected:

```bash
# Check remote
git remote -v

# Check branches
git branch -a

# Check log with graph
git log --oneline --graph --all
```

---

## 🎯 Now Ready for PR Workflow!

Your repository is set up with:

✅ `main` branch (production)
✅ `develop` branch (integration)
✅ 4 feature/bugfix branches ready for PRs
✅ Branch protection rules enabled
✅ Jira integration ready

**Next Step**: Start creating Pull Requests! 

See `PR_QUICK_START.md` for detailed instructions.

---

## 🆘 Troubleshooting

### Error: "fatal: could not read Username"
**Solution**: Use SSH key or GitHub CLI authentication instead of HTTPS

### Error: "Permission denied"
**Solution**: Check if remote URL is correct: `git remote -v`

### Branches not showing on GitHub
**Solution**: Make sure you pushed them:
```bash
git push -u origin <branch-name>
```

### Can't push to main
**Solution**: This is expected! Branch protection is working. Use PRs instead.

---

**Status**: ✅ Repository Ready
**Last Updated**: November 30, 2025
