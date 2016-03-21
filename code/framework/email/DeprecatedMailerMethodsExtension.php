<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 17:05
 */
class DeprecatedMailerMethodsExtension extends DataExtension
{

    /**
     * @deprecated since version 4.0
     */
    public function validEmailAddr($emailAddress) {
        Deprecation::notice('4.0', 'This method will be removed in 4.0. Use protected method Mailer->validEmailAddress().');
        return $this->validEmailAddress($emailAddress);
    }

    /**
     * @deprecated since version 4.0
     */
    public function wrapImagesInline($htmlContent) {
        Deprecation::notice('4.0', 'wrapImagesInline is deprecated');
    }

    /**
     * @deprecated since version 4.0
     */
    public function wrapImagesInline_rewriter($url) {
        Deprecation::notice('4.0', 'wrapImagesInline_rewriter is deprecated');
    }


}