<?php


/**
 * Delete items batch action.
 *
 * @package cms
 * @subpackage batchaction
 * @deprecated since version 4.0
 */
class CMSBatchAction_Delete extends CMSBatchAction
{
    public function getActionTitle()
    {
        return _t('CMSBatchActions.DELETE_DRAFT_PAGES', 'Delete from draft site');
    }

    public function run(SS_List $pages)
    {
        Deprecation::notice('4.0', 'Delete is deprecated. Use Archive instead');
        $status = array(
            'modified' => array(),
            'deleted' => array(),
            'error' => array()
        );

        foreach ($pages as $page) {
            $id = $page->ID;

            // Perform the action
            if ($page->canDelete()) $page->delete();
            else $status['error'][$page->ID] = true;

            // check to see if the record exists on the live site, 
            // if it doesn't remove the tree node
            $liveRecord = Versioned::get_one_by_stage('SiteTree', 'Live', array(
                '"SiteTree"."ID"' => $id
            ));
            if ($liveRecord) {
                $status['modified'][$liveRecord->ID] = array(
                    'TreeTitle' => $liveRecord->TreeTitle,
                );
            } else {
                $status['deleted'][$id] = array();
            }

        }

        return $this->response(_t('CMSBatchActions.DELETED_DRAFT_PAGES', 'Deleted %d pages from draft site, %d failures'), $status);
    }

    public function applicablePages($ids)
    {
        return $this->applicablePagesHelper($ids, 'canDelete', true, false);
    }
}


/**
 * Unpublish (delete from live site) items batch action.
 *
 * @package cms
 * @subpackage batchaction
 * @deprecated since version 4.0
 */
class CMSBatchAction_DeleteFromLive extends CMSBatchAction
{
    public function getActionTitle()
    {
        return _t('CMSBatchActions.DELETE_PAGES', 'Delete from published site');
    }

    public function run(SS_List $pages)
    {
        Deprecation::notice('4.0', 'Delete From Live is deprecated. Use Unpublish instead');
        $status = array(
            'modified' => array(),
            'deleted' => array()
        );

        foreach ($pages as $page) {
            $id = $page->ID;

            // Perform the action
            if ($page->canDelete()) $page->doDeleteFromLive();

            // check to see if the record exists on the stage site, if it doesn't remove the tree node
            $stageRecord = Versioned::get_one_by_stage('SiteTree', 'Stage', array(
                '"SiteTree"."ID"' => $id
            ));
            if ($stageRecord) {
                $status['modified'][$stageRecord->ID] = array(
                    'TreeTitle' => $stageRecord->TreeTitle,
                );
            } else {
                $status['deleted'][$id] = array();
            }

        }

        return $this->response(_t('CMSBatchActions.DELETED_PAGES', 'Deleted %d pages from published site, %d failures'), $status);
    }

    public function applicablePages($ids)
    {
        return $this->applicablePagesHelper($ids, 'canDelete', false, true);
    }
}
