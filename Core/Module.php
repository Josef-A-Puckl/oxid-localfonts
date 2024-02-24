<?php
/*
 *   *********************************************************************************************
 *      Please retain this copyright header in all versions of the software.
 *      Bitte belassen Sie diesen Copyright-Header in allen Versionen der Software.
 *
 *      Copyright (C) Josef A. Puckl | eComStyle.de
 *      All rights reserved - Alle Rechte vorbehalten
 *
 *      This commercial product must be properly licensed before being used!
 *      Please contact info@ecomstyle.de for more information.
 *
 *      Dieses kommerzielle Produkt muss vor der Verwendung ordnungsgemäß lizenziert werden!
 *      Bitte kontaktieren Sie info@ecomstyle.de für weitere Informationen.
 *   *********************************************************************************************
 */

namespace Ecs\LocalFonts\Core;

use OxidEsales\Eshop\Core\Registry;

class Module extends Module_parent
{
    protected $_aShopVersion = ['6.1', '6.2', '6.3', '6.4', '1.3'];

    public function getTitle()
    {
        $ret = parent::getTitle();

        if ($this->getId() === 'ecs_localfonts') {
            $sShopversion = \OxidEsales\Eshop\Core\ShopVersion::getVersion();
            $sShopversionParts = explode('.', $sShopversion);
            $majorMinorVersion = $sShopversionParts[0] . '.' . $sShopversionParts[1];
            if (!in_array($majorMinorVersion, $this->_aShopVersion)) {
                $iLang = Registry::getLang()->getTplLanguage();
                $sTitle = $this->getInfo('title', $iLang);
                $sModuleVersion = $this->getInfo('version');
                $oLang = Registry::getLang();
                return $sTitle . '<br><span style="color:red">' . $oLang->translateString('MODULVERSION') . $sModuleVersion . $oLang->translateString('NOTRELEASED') . $sShopversion . '</span>';
            }
        }

        return $ret;
    }
}
