# PR TEMPLATES & QUICK START

## 🚀 Quick Start: Creating Your First PR

### 1️⃣ Create Feature Branch
```bash
git checkout develop
git pull origin develop
git checkout -b feature/SCRUM-11-core-ui
```

### 2️⃣ Make Your Changes
```bash
# Edit files...
git add .
git commit -m "[SCRUM-11] Add navigation bar and hero section"
git commit -m "[SCRUM-11] Add features grid with icons"
# Make multiple commits as needed
```

### 3️⃣ Push to GitHub
```bash
git push origin feature/SCRUM-11-core-ui
```

### 4️⃣ Create PR on GitHub
**URL**: https://github.com/zainabk-design/QuickPOS/pulls

- **Base branch**: `develop`
- **Head branch**: `feature/SCRUM-11-core-ui`

### 5️⃣ Fill PR Template

---

## 📋 PR Description Template

Copy and use this for every PR:

```
## 🎯 Jira Ticket
- **Ticket**: [SCRUM-11](https://jira.yourcompany.com/browse/SCRUM-11)
- **Type**: Feature / Bug Fix
- **Priority**: High / Medium / Low

## 📝 Description
Brief explanation of what this PR does.

## 🔍 Changes Made
- Added navigation bar with responsive menu
- Created hero section with CTA button
- Added features grid with icons and descriptions
- Updated styling for mobile devices

## 🧪 Testing Performed
- ✅ Tested on desktop (Chrome, Firefox)
- ✅ Tested on mobile (iPhone 12, Samsung Galaxy)
- ✅ Form validation working correctly
- ✅ No console errors

## 📸 Screenshots/Demo
If applicable, add screenshots here.

## 🤝 Reviewers Needed
Assign to: @TechLead

## ✅ Checklist
- [x] Jira ticket ID included in commits
- [x] All tests pass
- [x] No breaking changes
- [x] Mobile responsive tested
- [x] Code review ready
```

---

## 📊 PR Status Workflow

```
Created
   ↓
Pending Review (Yellow)
   ↓
Approved (Green) ──→ Changes Requested (Red)
   ↓                         ↓
Merge                    Fix Issues
   ↓                         ↓
Merged ←─────────────────────┘
   ↓
Branch Deleted
```

---

## 🎯 Specific PR Details by Feature

### PR 1: SCRUM-11 Core UI
```markdown
## Title
[SCRUM-11] Add core UI: navigation, hero, features, illustrations

## What's Included
- index.php (updated with new sections)
- style.css (added navigation & hero styling)
- script.js (added interactivity)
- pictures/ (organized image assets)

## Testing
- Responsive design: Desktop ✓ Tablet ✓ Mobile ✓
- Navigation: Hamburger menu works ✓
- Images: All pictures loading correctly ✓
```

### PR 2: SCRUM-17 Pricing & Testimonials
```markdown
## Title
[SCRUM-17] Add pricing table and customer testimonials

## What's Included
- Pricing tier section in index.php
- Testimonials slider/grid
- Feature comparison table
- CSS animations

## Testing
- Pricing cards display correctly ✓
- Testimonials responsive ✓
- Animations smooth on mobile ✓
```

### PR 3: SCRUM-18 Contact Form
```markdown
## Title
[SCRUM-18] Implement contact form with validation

## What's Included
- index.php (form HTML)
- script.js (client-side validation)
- submit.php (server-side handling)
- thank-you.html (success page)

## Testing
- Form validation working ✓
- Email validation correct ✓
- PHP submission processing ✓
- Error messages displaying ✓
- Spam protection implemented ✓
```

### PR 4: SCRUM-40 Mobile Fixes
```markdown
## Title
[SCRUM-40] Fix mobile responsiveness issues

## What's Included
- style.css (improved media queries)
- script.js (mobile touch events)
- index.php (minor markup fixes)

## Testing
- iPhone 12 ✓
- Samsung Galaxy S21 ✓
- iPad Air ✓
- Touch interactions ✓
```

---

## 🔗 Useful Links

- **Repository**: https://github.com/zainabk-design/QuickPOS
- **Jira Board**: https://jira.yourcompany.com/browse/SCRUM
- **GitHub Docs**: https://docs.github.com/en/pull-requests

---

## ⚠️ Common Mistakes to Avoid

| ❌ Wrong | ✅ Right |
|---------|---------|
| `git commit -m "Add navbar"` | `git commit -m "[SCRUM-11] Add navigation bar"` |
| PR to `main` | PR to `develop` |
| No PR description | Detailed PR with checklist |
| Commit directly to `develop` | Create feature branch first |
| Merge without review | Get approval, then merge |

---

**Ready to code?** Start with PR 1 above! 🚀
