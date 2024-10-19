## Description

This plugin prevents unauthorised access to the WordPress REST API by ensuring that only logged-in users can access it. If a user tries to access the API without being authenticated, a 401 Unauthorised error will be returned.

### Features

- Restricts access to the REST API.
- Returns a 401 error for unauthenticated users.
- Lightweight and easy to install.

## Installation

### Manual Installation

1. Download the plugin from GitHub.
2. Upload the `restrict-wordpress-rest-api` folder to your `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

### Installation via WordPress Dashboard

1. Navigate to **Plugins > Add New** in the WordPress dashboard.
2. Click on the **Upload Plugin** button.
3. Upload the `restrict-rest-api.zip` file.
4. Click **Install Now** and then **Activate** the plugin.

## Usage

Once activated, the plugin will automatically restrict access to the WordPress REST API. If a user is not logged in, they will receive the following response when attempting to access the API:

```json
{
  "code": "Unauthorized",
  "message": "Authentication credentials are missing or invalid. Please provide a valid API token.",
  "data": {
    "status": 401
  }
}