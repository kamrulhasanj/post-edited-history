```markdown
# Post Edited History Plugin

[![License: GPL v2 or later]
(https://img.shields.io/badge/License-GPLv2-orange.svg)]
(https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)

## Description

The **Post Edited History Plugin** is designed to track and display the edit history of specific WordPress posts, specifically for the `'security-guide'` post type. With this plugin, users can add a shortcode `[post_edit_history]` to display the recent edit history of posts, making it easier to review changes and see who made them.

## Features

- Tracks the edit history of posts of the `'security-guide'` post type.
- Displays the last three edits, along with the timestamp and the editor's name.
- Includes a shortcode `[post_edit_history]` that can be added to display edit history on posts.
- Lightweight and easy to use.

## Installation

1. Download the plugin or clone the repository from GitHub: [Post Edited History Plugin](https://github.com/kamrulhasanj/post-edited-history).
2. Upload the plugin folder to your WordPress site's `wp-content/plugins/` directory.
3. Activate the plugin through the WordPress Admin Dashboard under the "Plugins" section.
4. Add the shortcode `[post_edit_history]` to any `'security-guide'` post to display its edit history.

## Usage

1. Ensure the post type you want to track edit history for is `'security-guide'`.
2. To display the edit history on the post, simply include the provided shortcode `[post_edit_history]` in the post content.
3. The edit history will display the last three edits (time and editor).

### Example Output

If the post has edit history, it will display as:

```
Current Version
- 2025-01-31 Reviewed and edited by: John Doe
- 2025-01-30 Reviewed and edited by: Jane Smith
- 2025-01-29 Reviewed and edited by: Alice Johnson
```

If no edit history is available, the following message will appear:

```
Edit History: No edit history available for this post.
```

## Hooks and Actions

The plugin uses the following WordPress hooks and actions:

- `save_post`: Saves the edit history to the post's metadata each time the post is updated.
- `add_shortcode`: Registers the `[post_edit_history]` shortcode for use in `'security-guide'` posts.
- `wp_enqueue_scripts`: Enqueues styles and scripts for the plugin.

## Plugin Files

- **CSS**: The plugin includes a CSS file (`assets/css/post-edited-history.css`) for styling the output.
- **JavaScript**: Includes a JS file (`assets/js/mainhelper.js`) for extending functionality.

## Contributing

Contributions are welcome! If you'd like to contribute, feel free to fork the repository on GitHub: [Post Edited History Plugin](https://github.com/kamrulhasanj/post-edited-history).

## Author

- **Kamrul Hasan**
- Website: [Kamrul Hasan's Facebook Profile](https://facebook.com/uikamrul)

## License

This plugin is licensed under the GPLv2 or later. For more details, refer to the [GNU General Public License v2.0](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html).
```
