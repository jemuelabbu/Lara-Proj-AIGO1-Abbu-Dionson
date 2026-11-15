# Git Brew: Cafe

**Group activity for IT 110: Building a Multi-Page Laravel Web App**

| **Group Name** | Git Brew |
| **Section** | AIGO1 |
| **Theme** | Git Brew: Cafe |
| **Members** | Jemuel Abbu, Ralph Dionson |

---

## Team Members and Assigned Modules

| Member | Branch Name | Assigned Module |
| Jemuel Abbu | `dev-member1-Abbu` | Project Setup, Layout, Home Page |
| Ralph Dionson | `dev-member2-Dionson` | About Page, Contact Page |

---

## Screenshots

### Member 1: Jemuel Abbu (Project Setup, Layout, Home Page)

_Screenshots to be added._

### Member 2: Ralph Dionson (About Page, Contact Page)

**About Page**

_Screenshots to be added._

**Contact Page**

_Screenshots to be added._

---

## Steps to Run the Project

### Requirements

| Tool | Notes |
| **PHP** (8.2 or higher) | Check with `php -v`. Included with Laravel Herd. |
| **Composer** | Check with `composer -V`. Included with Laravel Herd. |
| **Node.js and npm** | Check with `node -v` and `npm -v`. |
| **Git** | Check with `git --version`. |



### Installation

**1. Clone the repository**

```bash
git clone https://github.com/jemuelabbu/Lara-Proj-AIGO1-Abbu-Dionson.git
cd Lara-Proj-AIGO1-Abbu-Dionson
```

**2. Install PHP dependencies**

```bash
composer install
```

**3. Create the environment file**

Windows (Command Prompt):
```cmd
copy .env.example .env
```

Mac / Linux / Git Bash / PowerShell:
```bash
cp .env.example .env
```

**4. Generate the application key**

```bash
php artisan key:generate
```

**5. Set up the database (SQLite)**

Open `.env` and make sure it contains:

```dotenv
DB_CONNECTION=sqlite
```

The other `DB_` lines (host, port, username, password) can stay commented out. SQLite does not need them.

**6. Run the migrations**

```bash
php artisan migrate
```

If asked *"The SQLite database does not exist. Would you like to create it?"*, type **yes**.

**7. Install frontend dependencies**

```bash
npm install
```

### Running the project

**1. Start the Vite dev server** and keep this terminal open:

```bash
npm run dev
```

**2. Open the app.** Choose one of the following.

*Option A: Laravel Herd*

Herd serves the project automatically. Open:

```
https://lara-proj-aigo1-abbu-dionson.test
```

Check the **Sites** tab in the Herd app if the URL is different.

*Option B: Artisan server*

Open a second terminal in the project folder:

```bash
php artisan serve
```

Then open:

```
http://127.0.0.1:8000
```

---

## Working With Branches

Each member works on their own branch.

```bash
# Switch to your branch
git checkout dev-member1-Abbu      # Jemuel
git checkout dev-member2-Dionson   # Ralph

# Save and push your work
git add .
git commit -m "Describe your changes"
git push origin <your-branch-name>
```

---

## Troubleshooting

**`npm` is blocked in PowerShell ("running scripts is disabled")**

Run this once, then try again:

```powershell
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

Or use Command Prompt, or run `npm.cmd install`.

**"Vite manifest not found"**

Vite is not running. Start it with `npm run dev`, or build the assets once with `npm run build`, then refresh the page.

**"localhost refused to connect"**

`php artisan serve` is not running. Start it, or use the Herd URL instead.

**"No application encryption key has been generated"**

```bash
php artisan key:generate
```

**Database errors**

Check that `DB_CONNECTION=sqlite` is set in `.env` and that `database/database.sqlite` exists, then run:

```bash
php artisan config:clear
php artisan migrate
```

**Changes to `.env` are not applying**

```bash
php artisan config:clear
php artisan cache:clear
```

**"Class not found" errors**

```bash
composer dump-autoload
```

---

## Quick Reference

| Task | Command |
| Install PHP packages | `composer install` |
| Install JS packages | `npm install` |
| Run migrations | `php artisan migrate` |
| Start frontend dev server | `npm run dev` |
| Start Laravel server | `php artisan serve` |
| Build assets for production | `npm run build` |
| Clear config cache | `php artisan config:clear` |
