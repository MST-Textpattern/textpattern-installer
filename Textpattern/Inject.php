<?php

namespace Rah\TextpatternPluginInstaller\Textpattern;
use Rah\TextpatternPluginInstaller\Textpattern\Find as Textpattern;

/**
 * Injects Textpattern sources to the process.
 */

class Inject
{
    /**
     * Whether injection is ready.
     *
     * @var bool
     */

    static public $ready = false;

    /**
     * Working directory.
     *
     * @var string
     */

    static public $cwd = '';

    /**
     * Original plugin status.
     *
     * @var int
     */

    static public $plugins = 1;

    /**
     * Original admin-side plugin status.
     */

    static public $admin_side_plugins = 1;
}

if (!Inject::$ready && new Textpattern() && Textpattern::$path)
{
    global $here, $txpcfg, $loader, $connected, $DB, $txpac, $txp_permissions, $txp_groups, $microstart, $txptrace, $txptracelevel, $txp_current_tag, $txp_user, $qcount, $qtime, $production_status, $prefs, $prefs_id, $sitename, $siteurl, $site_slogan, $language, $url_mode, $timeoffset, $comments_on_default, $comments_default_invite, $comments_mode, $comments_disabled_after, $use_textile, $ping_weblogsdotcom, $rss_how_many, $logging, $use_comments, $use_categories, $use_sections, $send_lastmod, $path_from_root, $lastmod, $comments_dateformat, $dateformat, $archive_dateformat, $comments_moderate, $img_dir, $comments_disallow_images, $comments_sendmail, $file_max_upload_size, $path_to_site, $timezone_key, $default_event, $auto_dst, $permlink_mode, $comments_are_ol, $is_dst, $locale, $tempdir, $file_base_path, $blog_uid, $blog_mail_uid, $blog_time_uid, $publisher_email, $allow_page_php_scripting, $allow_article_php_scripting, $default_section, $comments_use_fat_textile, $show_article_category_count, $show_comment_count_in_feed, $syndicate_body_or_excerpt, $include_email_atom, $comment_means_site_updated, $never_display_email, $comments_require_name, $comments_require_email, $articles_use_excerpts, $allow_form_override, $attach_titles_to_permalinks, $permalink_title_format, $expire_logs_after, $use_plugins, $custom_1_set, $custom_2_set, $custom_3_set, $custom_4_set, $custom_5_set, $custom_6_set, $custom_7_set, $custom_8_set, $custom_9_set, $custom_10_set, $ping_textpattern_com, $use_dns, $admin_side_plugins, $comment_nofollow, $use_mail_on_feeds_id, $max_url_len, $spam_blacklists, $override_emailcharset, $comments_auto_append, $dbupdatetime, $version, $doctype, $theme_name, $gmtoffset, $plugin_cache_dir, $textile_updated, $title_no_widow, $lastmod_keepalive, $enable_xmlrpc_server, $smtp_from, $publish_expired_articles, $searchable_article_fields, $textarray, $plugins, $plugins_ver, $app_mode, $s, $pretext, $plugin_callback, $is_article_list, $status, $id, $c, $context, $q, $m, $pg, $p, $month, $author, $request_uri, $qs, $subpath, $req, $page, $css, $pfr, $nolog, $has_article_tag, $txp_current_form, $parentid, $thisauthor, $thissection, $is_article_body, $stack_article, $thispage, $uPosted, $limit, $permlinks, $thiscategory, $thisarticle, $variable, $thislink;

    Inject::$ready = true;
    Inject::$cwd = getcwd();
    chdir(Textpattern::$path);
    define('txpinterface', 'admin');

    include_once dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))).'/autoload.php';
    require_once './config.php';
    require_once './lib/constants.php';
    require_once './lib/txplib_misc.php';
    require_once './lib/txplib_db.php';

    Inject::$plugins = get_pref('use_plugins', 1, true);
    Inject::$admin_side_plugins = get_pref('admin_side_plugins', 1, true);
    set_pref('use_plugins', 0);
    set_pref('admin_side_plugins', 0);

    require_once './publish.php';

    set_pref('admin_side_plugins', Inject::$admin_side_plugins);
    set_pref('use_plugins', Inject::$plugins);
    $admin_side_plugins = $prefs['admin_side_plugins'] = $use_plugin = $prefs['use_plugins'] = 0;
    chdir(Inject::$cwd);
}