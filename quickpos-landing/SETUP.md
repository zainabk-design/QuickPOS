# ⚡ QuickPOS PHP Landing Page - Quick Setup Guide

## 🎯 5-Minute Setup

### Step 1: Install Server (Choose One)

#### XAMPP (Easiest - Recommended)
```
1. Download: https://www.apachefriends.org/
2. Install with defaults
3. Done!
```

#### WAMP (Windows)
```
1. Download: http://www.wampserver.com/
2. Install
3. Done!
```

#### LAMP (Linux)
```bash
sudo apt-get install apache2 php
```

### Step 2: Copy Project Files

**XAMPP:**
```
C:\xampp\htdocs\quickpos-landing\
├── index.php
├── style.css
├── script.js
└── submit.php
```

**WAMP:**
```
C:\wamp\www\quickpos-landing\
├── index.php
├── style.css
├── script.js
└── submit.php
```

### Step 3: Start Server

- **XAMPP**: Click "Start" next to Apache in control panel
- **WAMP**: Click tray icon → Start All Services
- **LAMP**: `sudo systemctl start apache2`

### Step 4: Open in Browser

```
http://localhost/quickpos-landing/
```

---

## ✨ You're Done!

Your landing page is now live with:
- ✅ Fully responsive design
- ✅ Pricing toggle (monthly/yearly)
- ✅ Contact form with validation
- ✅ Smooth scroll animations
- ✅ Mobile-friendly navigation

---

## 🎨 Quick Customization

### Change Company Name
File: `index.php` (Line 131)
```php
<div class="text-2xl font-bold gradient-text">⚡ YourCompany</div>
```

### Change Prices
File: `index.php` (Lines 28-60)
```php
$pricing_plans = [
    'monthly' => [
        [
            'name' => 'Basic',
            'price' => 29,  // ← Change this
            'features' => [...]
        ],
    ]
]
```

### Change Hero Text
File: `index.php` (Lines 154-158)
```html
<h1 class="text-5xl md:text-6xl font-bold mb-6">
    Your Title Here
</h1>
<p class="text-xl text-gray-600">
    Your subtitle here
</p>
```

### Change Colors
File: `style.css` (Search and replace)
```css
#4C41FF  → Your primary color
#3EBEFF  → Your secondary color
```

---

## 📊 Form Submissions

Submissions are saved in: `logs/submissions.json`

**View via FTP/SSH:**
```
/quickpos-landing/logs/submissions.json
```

**Example submission:**
```json
{
  "id": "sub_12345abc",
  "timestamp": "2025-01-15 14:30:00",
  "name": "John Doe",
  "email": "john@example.com",
  "message": "I'm interested in QuickPOS",
  "ip_address": "192.168.1.1"
}
```

---

## 📱 Test on Mobile

### Local Testing
```
1. On same WiFi as computer
2. Find your computer IP: ipconfig (Windows) or ifconfig (Linux)
3. Open: http://YOUR_IP/quickpos-landing/
4. Test on phone/tablet
```

### Online Testing
```
1. Use ngrok: https://ngrok.com/
2. Download ngrok
3. Run: ngrok http 80
4. Share the https:// URL
```

---

## 🚀 Deploy to Live Server

### Via FTP (Bluehost, Hostinger, etc.)

1. **Connect**
   - Download FileZilla: https://filezilla-project.org/
   - Get FTP details from host
   - Connect to server

2. **Upload Files**
   ```
   Upload to: /public_html/quickpos/
   - index.php
   - style.css
   - script.js
   - submit.php
   ```

3. **Create logs folder**
   - Right-click → Create folder → Name: logs
   - Set permissions to 755

4. **Access**
   ```
   https://yourdomain.com/quickpos/
   ```

### Via Git (Recommended)

```bash
# Initialize git
git init
git add .
git commit -m "Initial commit"

# Push to GitHub/GitLab/Bitbucket

# On server
git clone https://github.com/YOUR_REPO.git
```

---

## ✅ Testing Checklist

- [ ] Page loads without errors
- [ ] Responsive on mobile (open DevTools → Toggle device toolbar)
- [ ] Pricing toggle works (click Monthly/Yearly)
- [ ] Form validation works (leave field empty, try to submit)
- [ ] Form submission succeeds (fill all fields, submit)
- [ ] Check `logs/submissions.json` for entry
- [ ] Scroll animations work (scroll down page)
- [ ] Mobile menu works (click hamburger icon)
- [ ] All links work (try navigation links)

---

## 🔧 Troubleshooting

### White Page / No Content
```
Issue: File permissions
Solution: Set index.php to 644, other files to 644
```

### Form Not Submitting
```
Check 1: logs/ folder exists
Check 2: logs/ folder has 755 permissions
Check 3: Browser console (F12) for errors
```

### Styles Not Loading
```
Solution 1: Clear cache (Ctrl+Shift+Del)
Solution 2: Hard refresh (Ctrl+F5)
Solution 3: Check browser console for 404 errors
```

### Script Not Working
```
Check: Browser console (F12 → Console tab)
Look for: Red errors
Solution: May need to allow scripts in browser settings
```

---

## 📞 Need Help?

1. **Check browser console**: F12 → Console tab
2. **Check PHP errors**: Look in `/logs/` folder
3. **Check file permissions**: Should be 644 for files, 755 for folders
4. **Check server logs**: XAMPP/WAMP logs directory

---

## 🎯 Next Steps

1. ✅ Customize company name/colors
2. ✅ Update pricing plans
3. ✅ Set up email notifications (optional)
4. ✅ Test form submission
5. ✅ Deploy to live server
6. ✅ Monitor submissions

---

## 📚 File Guide

| File | What It Does |
|------|-------------|
| `index.php` | Main landing page (HTML + PHP) |
| `style.css` | All styling and animations |
| `script.js` | Interactivity (pricing, form, scroll) |
| `submit.php` | Form submission handler |
| `logs/submissions.json` | Stores form submissions |

---

## 🚀 You're All Set!

Your QuickPOS landing page is ready to go.

**Access it now:** `http://localhost/quickpos-landing/`

**Happy selling! ⚡**
