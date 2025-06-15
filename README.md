# ControllerApplication Setup Guide

This guide explains how to properly install a Laravel project inside this repository without deleting the `.git` folder or breaking Git history. <br>
Follow each instruction as is!!! <br>
**If you dont know how to do this with your windows terminal or you have any issues throughout the process, dm me!**

## Step-by-Step Instructions

### 1. Clone the Project:
Clone the project in your local machine through git cli or github desktop:
```
git clone https://github.com/KlajdiGashi/ControllerApplication
```

### 2. Create your Branch:
After cloning the project, create your own branch with {username_mvc}:

```
git checkout -b KlajdiGashi_mvc
```


### 3. Create a Temporary Folder

In the root of the project (`ControllerApplication`), create and enter a new temporary directory:

```bash
mkdir temp && cd temp
```

### 4. Install Laravel

Run the following command inside the temp directory:

```
composer create-project laravel/laravel .
```

This will install a fresh Laravel project inside the temporary folder.

### 5. Move Files to Main Directory

Once Laravel is installed, move everything, including hidden files like .env and .gitignore, back to the main project folder:

```
mv * .[^.]* ..
```
This command moves all files (including hidden ones) up one directory(for a better && cleaner repo)

### 6. Delete the Temporary Folder

After moving the files, go back to the main directory and delete the empty temp folder:

```
cd ..
rm -rf temp
```

### 7. Install Composer again to check if there are any issues with the files

```
Composer install
```

### 8. Add your .env file + other configurations that are needed

If composer install somehow still doesnt let you run the application try this:

```
npm i && npm build
```

### 9. After finishing your work do a pull request to main so that the person in charge can review all the changes youve done, just as a reminder to let us know you have finished the tasks

