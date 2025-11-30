# 📝 Commit Message Guidelines & Jira Integration

## ✅ Required Format

All commits MUST include the Jira ticket ID:

```
[JIRA-ID] Subject line (50 chars or less)

Optional body paragraph explaining why this change
was made. Wrap at 72 characters. Include any relevant
details or context.

Fixes: JIRA-ID (if this closes a ticket)
Related to: JIRA-ID (if related but not closing)
```

---

## 📚 Commit Type Prefixes

Use these prefixes BEFORE the Jira ID for clarity:

| Type | Usage | Example |
|------|-------|---------|
| `feat` | New feature | `[SCRUM-11] feat: add navigation bar` |
| `fix` | Bug fix | `[SCRUM-40] fix: mobile menu responsive` |
| `docs` | Documentation | `[SCRUM-21] docs: update readme` |
| `style` | Code style changes | `[SCRUM-12] style: format CSS` |
| `refactor` | Code refactoring | `[SCRUM-15] refactor: optimize form` |
| `perf` | Performance improvement | `[SCRUM-25] perf: lazy load images` |
| `test` | Adding tests | `[SCRUM-30] test: add form validation` |
| `chore` | Maintenance tasks | `[SCRUM-5] chore: update dependencies` |

---

## ✅ Good Commit Messages

### Example 1: Feature
```
[SCRUM-11] feat: add responsive navigation bar

- Implemented hamburger menu for mobile devices
- Added smooth transitions between states
- Tested on all major browsers
- Accessible keyboard navigation added
```

### Example 2: Bug Fix
```
[SCRUM-40] fix: correct mobile responsiveness on hero section

The hero section was not properly scaling on devices
smaller than 768px. Updated media query breakpoints
and tested on iPhone 12, iPad, and Galaxy S21.

Fixes: SCRUM-40
```

### Example 3: Feature with Multiple Parts
```
[SCRUM-18] feat: implement contact form with validation

- Created HTML form with all required fields
- Added client-side validation using JavaScript
- Implemented server-side PHP validation
- Added success/error message handling
- Tested form submission flow end-to-end

Related to: SCRUM-21 (email notifications)
```

### Example 4: Documentation
```
[SCRUM-50] docs: add deployment guide

Added comprehensive deployment instructions including:
- Environment setup
- Database configuration
- Server deployment process
- Troubleshooting section
```

---

## ❌ Bad Commit Messages

```
❌ "Added stuff"
❌ "Fixed bug"
❌ "Updates"
❌ "asdf"
❌ "fixed navbar" (no Jira ID!)
❌ "[SCRUM-11] updated files"
❌ "[SCRUM-11] THIS IS A REALLY REALLY LONG COMMIT MESSAGE THAT GOES ON AND ON"
```

---

## 🎯 Commit Examples by Feature

### SCRUM-11: Core UI Development
```bash
git commit -m "[SCRUM-11] feat: add navigation bar with logo and menu"
git commit -m "[SCRUM-11] feat: create hero section with CTA"
git commit -m "[SCRUM-11] feat: add features grid section"
git commit -m "[SCRUM-11] feat: integrate product images"
git commit -m "[SCRUM-11] style: add responsive design to header"
```

### SCRUM-17: Pricing & Testimonials
```bash
git commit -m "[SCRUM-17] feat: create pricing tier cards"
git commit -m "[SCRUM-17] feat: add feature comparison table"
git commit -m "[SCRUM-17] feat: implement testimonials section"
git commit -m "[SCRUM-17] feat: add pricing tier animations"
```

### SCRUM-18: Contact Form
```bash
git commit -m "[SCRUM-18] feat: create contact form HTML"
git commit -m "[SCRUM-18] feat: add form validation JavaScript"
git commit -m "[SCRUM-18] feat: implement PHP form submission"
git commit -m "[SCRUM-18] feat: add success/error notifications"
git commit -m "[SCRUM-18] feat: add spam protection to form"
```

### SCRUM-40: Mobile Fixes
```bash
git commit -m "[SCRUM-40] fix: correct mobile viewport meta tag"
git commit -m "[SCRUM-40] fix: improve hamburger menu touch targets"
git commit -m "[SCRUM-40] fix: adjust font sizes for mobile"
git commit -m "[SCRUM-40] fix: correct form input sizing on mobile"
git commit -m "[SCRUM-40] test: verify responsive design on devices"
```

---

## 🔍 Viewing Commit Messages

```bash
# View last 10 commits with messages
git log -10 --oneline

# View commits with details
git log --oneline --decorate --graph

# View commits for a specific file
git log -- quickpos-landing/index.php

# View commits for a specific author
git log --author="John Doe"

# View commits between dates
git log --since="2 weeks ago" --until="now"

# Search commit messages for keyword
git log --grep="SCRUM-11"
```

---

## 🔗 Jira Integration Commands

### Link Commit to Jira Ticket
In commit message body, use:
```
Fixes: SCRUM-11
```
This will automatically close the ticket when commit is merged.

### Reference Related Tickets
```
Related to: SCRUM-11, SCRUM-12
```

### Update Jira with Commit
Jira will automatically:
1. Link the commit to the ticket
2. Show commit info in ticket activity
3. Update ticket status (if configured)

Example commit for auto-closing Jira ticket:
```bash
git commit -m "[SCRUM-11] feat: complete navigation component

Implemented full responsive navigation bar with:
- Logo and branding
- Desktop menu
- Mobile hamburger menu
- Accessibility improvements

Fixes: SCRUM-11"
```

---

## 📊 Commit History Example

After following these guidelines, your commit history will look like:

```
* abc1234 (HEAD -> feature/SCRUM-11-core-ui) [SCRUM-11] feat: complete core UI components
* def5678 [SCRUM-11] feat: add features section
* ghi9012 [SCRUM-11] feat: integrate product images
* jkl3456 (develop) docs: Add GitHub workflow guide
* mno7890 (origin/main) chore: Initial project setup
```

---

## 💡 Pro Tips

1. **Commit frequently**: Small, focused commits are easier to review
2. **Be descriptive**: Future you will thank you
3. **Include context**: Why was this change made?
4. **Link to Jira**: Automatic workflow tracking
5. **Keep it professional**: This is your code portfolio!

---

**Remember**: Good commit messages = Better code history = Better team collaboration ✅

Last Updated: November 30, 2025
