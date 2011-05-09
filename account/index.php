<?php

/**
 * Copyright (C) 2010-2011 Shadez <https://github.com/Shadez>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

include('../includes/WoW_Loader.php');
$url_data = WoW::GetUrlData('management');
if(!is_array($url_data) || !isset($url_data['action1']) || $url_data['action1'] != 'management') {
    header('Location: /account/management/');
    exit;
}
if(!WoW_Account::IsLoggedIn()) {
    header('Location: /login/');
    exit;
}
WoW_Template::SetTemplateTheme('account');
if($url_data['action2'] == 'wow' && preg_match('/dashboard.html/i', $url_data['action3'])) {
    WoW_Template::SetPageIndex('dashboard');
    WoW_Template::SetMenuIndex('games');
    WoW_Template::SetPageData('page', 'dashboard');
}
else {
    WoW_Template::SetPageIndex('management');
    WoW_Template::SetMenuIndex('management');
    WoW_Template::SetPageData('page', 'management');
}
WoW_Template::LoadTemplate('page_index');
?>