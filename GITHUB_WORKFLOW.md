# QuickPOS Landing Page - GitHub Workflow Guide

## 📋 Project Overview
- **Repository**: https://github.com/zainabk-design/QuickPOS
- **Branch Strategy**: GitFlow
- **Integration**: Jira Tickets Required in All Commits & PRs
- **Code Review**: Mandatory (Min. 1 approval from Tech Lead)

---

## 🌳 Branch Structure

```
main (production-ready)
  ↑
  └─ develop (integration branch)
       ├─ feature/SCRUM-11-core-ui
       ├─ feature/SCRUM-17-pricing-testimonials
       ├─ feature/SCRUM-18-contact-form
       └─ bugfix/SCRUM-40-mobile
```

### Branch Rules:
- **`main`** - Production releases only, protected branch
- **`develop`** - Integration branch for features, all PRs merge here
- **`feature/*`** - New features from develop, merge back via PR
- **`bugfix/*`** - Bug fixes from develop, merge back via PR

---

## 📦 Project Structure

```
quickpos-landing/
├── index.php              # Main landing page
├── style.css              # Styling
├── script.js              # JavaScript functionality
├── submit.php             # Form submission handler
├── thank-you.html         # Thank you page
├── pictures/              # Image assets
│   ├── 336e07d478ca0387aa50b3f74d943202.jpg
│   ├── 3e453a9e2a6255a20c1610a84ad0939b.jpg
│   ├── a08ea6736391e439d41e797577d0ca1d.jpg
│   └── cbef9214c58feb03b64b2830b5aef3d2.jpg
├── README.md
├── SETUP.md
└── *.md                   # Documentation
```

---

## 🔧 Git Commit Message Format

**REQUIRED**: All commits must include Jira ticket ID

```
[JIRA-ID] Brief description of change

Optional detailed explanation here.
```

### Examples:
```
[SCRUM-11] Add core UI: navigation and hero section
[SCRUM-17] Add pricing table and testimonials section
[SCRUM-18] Implement contact form validation
[SCRUM-40] Fix mobile responsiveness issues
[SCRUM-41] Fix form submission on iOS devices
```

---

## 🚀 Feature Development Workflow

### Step 1: Create Feature Branch
```bash
# Switch to develop branch
git checkout develop

# Pull latest changes
git pull origin develop

# Create feature branch from develop
git checkout -b feature/SCRUM-XX-feature-name
```

### Step 2: Make Changes
```bash
# Edit files as needed
# Commit with Jira ticket ID
git add .
git commit -m "[SCRUM-XX] Description of changes"
```

### Step 3: Push to Remote
```bash
git push origin feature/SCRUM-XX-feature-name
```

### Step 4: Create Pull Request on GitHub
1. Go to https://github.com/zainabk-design/QuickPOS
2. Click "New Pull Request"
3. **Base**: `develop` (NOT main)
4. **Compare**: `feature/SCRUM-XX-feature-name`
5. **Title**: `[SCRUM-XX] Add feature description`
6. **Description**: Include:
   - What changes were made
   - Why the changes were made
   - Testing performed
   - Related Jira ticket link
7. **Assign reviewers** (preferably Tech Lead)
8. Submit PR

### Step 5: Code Review & Approval
- Tech Lead or team member reviews code
- Request changes if needed / Re-commit with fixes
- Once approved, **Merge Pull Request** (Squash or Create merge commit)
- Delete feature branch after merge

---

## 📝 Active Features - PR Checklist

### PR 1: Core UI Components
- **Branch**: `feature/SCRUM-11-core-ui`
- **Jira Ticket**: [SCRUM-11]
- **PR Title**: `[SCRUM-11] Add core UI: navigation, hero, features, illustrations`
- **Components**:
  - Navigation bar
  - Hero section with CTA
  - Features grid
  - Image galleries
  - Footer

### PR 2: Pricing & Testimonials
- **Branch**: `feature/SCRUM-17-pricing-testimonials`
- **Jira Ticket**: [SCRUM-17]
- **PR Title**: `[SCRUM-17] Add pricing table and customer testimonials`
- **Components**:
  - Pricing tier cards
  - Feature comparison table
  - Customer testimonials/reviews
  - Call-to-action sections

### PR 3: Contact Form
- **Branch**: `feature/SCRUM-18-contact-form`
- **Jira Ticket**: [SCRUM-18]
- **PR Title**: `[SCRUM-18] Implement contact form with validation`
- **Components**:
  - Form fields (name, email, message, etc.)
  - Client-side validation (JavaScript)
  - Server-side validation (PHP)
  - Form submission handling
  - Success/error messages

### PR 4: Mobile Responsiveness
- **Branch**: `bugfix/SCRUM-40-mobile`
- **Jira Ticket**: [SCRUM-40]
- **PR Title**: `[SCRUM-40] Fix mobile responsiveness issues`
- **Components**:
  - Responsive design testing
  - Media query adjustments
  - Touch-friendly buttons
  - Mobile navigation fixes

---

## ✅ Code Review Checklist

Before merging any PR, reviewers must verify:

- [ ] Jira ticket ID in commit messages and PR title
- [ ] Code follows project style guide
- [ ] No console errors or warnings
- [ ] Responsive design tested (mobile, tablet, desktop)
- [ ] Cross-browser compatibility (Chrome, Firefox, Safari, Edge)
- [ ] Form validation working correctly
- [ ] No hardcoded values or credentials
- [ ] Comments/documentation added for complex code
- [ ] All tests pass (if applicable)

---

## 🔄 Merging & Release Process

### Merge to `develop`:
1. Feature/bugfix PR is approved
2. Click "Merge Pull Request" on GitHub
3. Optionally delete remote branch
4. Delete local branch: `git branch -d feature/SCRUM-XX-feature-name`

### Release to `main`:
```bash
# Create release branch
git checkout -b release/v1.0.0 develop

# On GitHub: Create PR from release/v1.0.0 to main
# Once merged to main: create Git Tag
git tag -a v1.0.0 -m "Release version 1.0.0"
git push origin v1.0.0

# Merge back to develop
git checkout develop
git merge release/v1.0.0
git push origin develop
```

---

## 🛠️ Useful Git Commands

```bash
# Update local branch with latest develop
git checkout feature/SCRUM-XX-feature-name
git pull origin develop

# View commit log with branch graph
git log --oneline --graph --all

# View changes before committing
git diff

# Undo last local commit (keep changes)
git reset --soft HEAD~1

# Stash changes temporarily
git stash
git stash pop

# Rebase feature branch onto develop (cleaner history)
git rebase origin/develop

# Fetch all branches from remote
git fetch --all
git branch -r
```

---

## ❌ What NOT to Do

- ❌ Never commit directly to `main`
- ❌ Never commit directly to `develop`
- ❌ Never force push (`git push -f`) to shared branches
- ❌ Never forget Jira ticket ID in commit messages
- ❌ Never merge without code review approval
- ❌ Never skip testing before creating PR
- ❌ Never leave work uncommitted for extended periods

---

## 📞 Support & Questions

For questions about the workflow, contact your Tech Lead or project manager.

**Last Updated**: November 30, 2025
**Status**: Active - Ready for Feature Development

---
