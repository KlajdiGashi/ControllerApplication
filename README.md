# ControllerApplication Setup Guide

This guide explains how to properly install a Laravel project inside this repository without deleting the `.git` folder or breaking Git history. <br>
Follow each instruction as is!!! <br>
**If you dont know how to do this with your windows terminal or you have any issues throughout the process, dm me!**

## Step-by-Step Instructions

### 1. Create a Temporary Folder

In the root of the project (`ControllerApplication`), create and enter a new temporary directory:

```bash
mkdir temp && cd temp
```

### 2. Install Laravel

Run the following command inside the temp directory:

```
composer create-project laravel/laravel .
```

This will install a fresh Laravel project inside the temporary folder.

### 3. Move Files to Main Directory

Once Laravel is installed, move everything, including hidden files like .env and .gitignore, back to the main project folder:

```
mv * .[^.]* ..
```
This command moves all files (including hidden ones) up one directory(for a better && cleaner repo)

### 4. Delete the Temporary Folder

After moving the files, go back to the main directory and delete the empty temp folder:

```
cd ..
rm -rf temp
```
