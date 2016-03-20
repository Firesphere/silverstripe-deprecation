<?php

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function htmlEmail($to, $from, $subject, $htmlContent, $attachedFiles = false, $customheaders = false,
                   $plainContent = false) {

    Deprecation::notice('4.0', 'Use Email->sendHTML() instead');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->sendHTML($to, $from, $subject, $plainContent, $attachedFiles, $customheaders = false);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function plaintextEmail($to, $from, $subject, $plainContent, $attachedFiles, $customheaders = false) {
    Deprecation::notice('4.0', 'Use Email->sendPlain() instead');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->sendPlain($to, $from, $subject, $plainContent, $attachedFiles, $customheaders = false);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function encodeMultipart($parts, $contentType, $headers = false) {
    Deprecation::notice('4.0', 'Use Email->$this->encodeMultipart() instead');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->encodeMultipart($parts, $contentType, $headers = false);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function wrapImagesInline($htmlContent) {
    Deprecation::notice('4.0', 'Functionality removed from core');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->wrapImagesInline($htmlContent);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function wrapImagesInline_rewriter($url) {
    Deprecation::notice('4.0', 'Functionality removed from core');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->wrapImagesInline_rewriter($url);

}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function processHeaders($headers, $body = false) {
    Deprecation::notice('4.0', 'Set headers through Email->addCustomHeader()');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->processHeaders($headers, $url);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function encodeFileForEmail($file, $destFileName = false, $disposition = NULL, $extraHeaders = "") {
    Deprecation::notice('4.0', 'Please add files through Email->attachFile()');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->encodeFileForEmail($file, $destFileName, $disposition, $extraHeaders);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function QuotedPrintable_encode($quotprint) {
    Deprecation::notice('4.0', 'No longer available, handled internally');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->QuotedPrintable_encode($quotprint);
}

/**
 * @package framework
 * @subpackage email
 * @deprecated 3.1
 */
function validEmailAddr($emailAddress) {
    Deprecation::notice('4.0', 'This method will be removed in 4.0. Use protected method Mailer->validEmailAddress().');

    $mailer = Injector::inst()->create('Mailer');
    return $mailer->validEmailAddr($emailAddress);
}
