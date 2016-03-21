<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 21/03/16
 * Time: 19:25
 */
class DeprecatedGDBackendMethodsExtension extends DataExtension
{

    /**
     * Set the default image quality.
     *
     * @deprecated 4.0 Use the "GDBackend.default_quality" config setting instead
     * @param int $quality A number from 0 to 100, 100 being the best quality.
     */
    public static function set_default_quality($quality) {
        Deprecation::notice('4.0', 'Use the "GDBackend.default_quality" config setting instead');
        if(is_numeric($quality) && (int) $quality >= 0 && (int) $quality <= 100) {
            Config::inst()->update('GDBackend', 'default_quality', (int) $quality);
        }
    }

    /**
     * @deprecated
     */
    public function setGD($gd) {
        Deprecation::notice('4.0', 'Use GD::setImageResource instead');
        return $this->owner->setImageResource($gd);
    }

    /**
     * @deprecated
     */
    public function getGD() {
        Deprecation::notice('4.0', 'GD::getImageResource instead');
        return $this->owner->getImageResource();
    }

    /**
     * @deprecated
     */
    public function hasGD() {
        Deprecation::notice('4.0', 'GD::hasImageResource instead',
            Deprecation::SCOPE_CLASS);
        return $this->owner->hasImageResource();
    }

}