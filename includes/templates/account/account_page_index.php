<?php WoW_Template::LoadTemplate('block_header'); ?>
<body class="<?php echo sprintf('%s%s', WoW_Locale::GetLocale(LOCALE_DOUBLE), WoW_Account::IsLoggedIn() ? ' logged-in' : null); ?>">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<div id="search-bar">
<form action="/search" method="get" id="search-form">
<div>
<input type="text" name="q" id="search-field" value="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" maxlength="35" alt="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" tabindex="50" accesskey="q" />
<input type="submit" id="search-button" value="" title="<?php echo WoW_Locale::GetString('template_bn_search'); ?>" tabindex="50" />
</div>
</form>
</div>
<h1 id="logo"><a href="/" tabindex="50" accesskey="h">Battle.net</a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="/account/management/"> <?php echo WoW_Locale::GetString('template_management_account_management'); ?>
</a></h2>
<ul>
<li<?php echo WoW_Template::GetMenuIndex() == 'management' ? ' class="active"' : null; ?>>
<a href="/account/management/" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_information'); ?></a>
<span></span>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'settings' ? ' class="active"' : null; ?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'settings'); return false;"><?php echo WoW_Locale::GetString('template_management_menu_parameters'); ?></a>
<span></span>
<div class="flyout-menu" id="settings-menu" style="display: none">
<ul>
<li><a href="/account/management/settings/change-email.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_email'); ?></a></li>
<li><a href="/account/management/settings/change-password.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_password'); ?></a></li>
<li><a href="/account/management/settings/change-communication.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_change_communication'); ?></a></li>
<li><a href="/account/parental-controls/index.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_parental_control'); ?></a></li>
<li><a href="/account/management/wallet.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_payment_method'); ?></a></li>
<li><a href="/account/management/address-book.html"><?php echo WoW_Locale::GetString('template_management_menu_parameters_address_book'); ?></a></li>
</ul>
</div>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'games' ? ' class="active"' : null; ?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'games'); return false;"><?php echo WoW_Locale::GetString('template_management_menu_games'); ?></a>
<span></span>
<div class="flyout-menu" id="games-menu" style="display: none">
<ul>
<li><a href="/account/management/add-game.html"><?php echo WoW_Locale::GetString('template_management_menu_games_add_game'); ?></a></li>
<li><a href="/account/management/get-a-game.html"><?php echo WoW_Locale::GetString('template_management_menu_games_get_a_game'); ?></a></li>
<li><a href="/account/management/wow-account-conversion.html"><?php echo WoW_Locale::GetString('template_management_menu_games_wow_conversion'); ?></a></li>
<li><a href="/account/management/download/"><?php echo WoW_Locale::GetString('template_management_menu_games_download'); ?></a></li>
<li><a href="/account/management/beta-profile.html"><?php echo WoW_Locale::GetString('template_management_menu_games_beta_profile'); ?></a></li>
<li><a href="/account/management/redemption/redeem.html"><?php echo WoW_Locale::GetString('template_management_menu_games_redeem'); ?></a></li>
</ul>
</div>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'orders' ? ' class="active"' : null; ?>>
<a href="/account/management/orders.html" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_operations'); ?></a>
<span></span>
</li>
<li<?php echo WoW_Template::GetMenuIndex() == 'security' ? ' class="active"' : null; ?>>
<a href="/account/management/authenticator.html" class="border-3"><?php echo WoW_Locale::GetString('template_management_menu_security'); ?></a>
<span></span>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<span class="clear"></span>
</div>
</div>
<?php WoW_Template::LoadTemplate('block_service', true); ?>
</div>
</div>
<?php
switch(WoW_Template::GetPageIndex()) {
    case 'management':
        WoW_Template::LoadTemplate('content_management');
        break;
    case 'dashboard':
        WoW_Template::LoadTemplate('content_dashboard');
        break;
}
?>
<div id="layout-bottom">
<div class="wrapper">
<?php WoW_Template::LoadTemplate('block_footer', true); ?>
</div>
</div>
<?php WoW_Template::LoadTemplate('block_js_messages', true); ?>
<script type="text/javascript" src="/account/js/bam.js?v19"></script>
<script type="text/javascript" src="/account/local-common/js/tooltip.js?v17"></script>
<script type="text/javascript" src="/account/local-common/js/menu.js?v17"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = '/wow/data/i18n.frag';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="/account/local-common/js/third-party/jquery.pngFix.pack.js?v17"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<?php
switch(WoW_Template::GetPageIndex()) {
    case 'management':
        echo '<script type="text/javascript" src="/account/js/management/lobby.js?v19"></script>';
        break;
    case 'dashboard':
        echo '<script type="text/javascript" src="/account/local-common/js/third-party/swfobject.js?v17"></script>
<script type="text/javascript" src="/account/js/management/dashboard.js?v19"></script>
<script type="text/javascript" src="/account/js/management/wow/dashboard.js?v19"></script>';
        break;
}
?>

<script type="text/javascript">
//<![CDATA[
Core.load("/account/local-common/js/overlay.js?v17");
Core.load("/account/local-common/js/search.js?v17");
Core.load("/account/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v17");
Core.load("/account/local-common/js/third-party/jquery.mousewheel.min.js?v17");
Core.load("/account/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v17");
Core.load("/account/local-common/js/login.js?v17", false, function() {
Login.embeddedUrl = '/login/login.frag';
});
//]]>
</script>
</body>
</html>