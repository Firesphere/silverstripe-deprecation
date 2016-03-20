<?php

/**
 * class DeprecatedDataObjectMethodsExtension contains the methods that are being deprecated and
 * will disappear in favor of new methods in the near future.
 *
 * @property DeprecatedDataObjectMethodsExtension|DataObject owner
 */
class DeprecatedDataObjectMethodsExtension extends DataExtension
{

    /**
     * Returns when validation on DataObjects is enabled.
     *
     * @deprecated 3.2 Use the "DataObject.validation_enabled" config setting instead
     * @return bool
     */
    public static function get_validation_enabled()
    {
        Deprecation::notice('3.2', 'Use the "DataObject.validation_enabled" config setting instead');
        return Config::inst()->get('DataObject', 'validation_enabled');
    }


    /**
     * Set whether DataObjects should be validated before they are written.
     *
     * Caution: Validation can contain safeguards against invalid/malicious data,
     * and check permission levels (e.g. on {@link Group}). Therefore it is recommended
     * to only disable validation for very specific use cases.
     *
     * @param $enable bool
     * @see DataObject::validate()
     * @deprecated 3.2 Use the "DataObject.validation_enabled" config setting instead
     */
    public static function set_validation_enabled($enable)
    {
        Deprecation::notice('3.2', 'Use the "DataObject.validation_enabled" config setting instead');
        Config::inst()->update('DataObject', 'validation_enabled', (bool)$enable);
    }

    /**
     * @deprecated
     */
    public function getComponentsQuery($componentName, $filter = "", $sort = "", $join = "", $limit = "")
    {
        Deprecation::notice('4.0', "Use getComponents to get a filtered DataList for an object's relation");
        return $this->getComponents($componentName, $filter, $sort, $join, $limit);
    }

    /**
     * @deprecated 4.0 Method has been replaced by hasOne() and hasOneComponent()
     * @param string $component
     * @return array|null
     */
    public function has_one($component = null)
    {
        if ($component) {
            Deprecation::notice('4.0', 'Please use hasOneComponent() instead');
            return $this->owner->hasOneComponent($component);
        }

        Deprecation::notice('4.0', 'Please use hasOne() instead');
        return $this->owner->hasOne();
    }

    /**
     * @deprecated 4.0 Method has been replaced by belongsTo() and belongsToComponent()
     * @param string $component
     * @param bool $classOnly
     * @return array|null
     */
    public function belongs_to($component = null, $classOnly = true)
    {
        if ($component) {
            Deprecation::notice('4.0', 'Please use belongsToComponent() instead');
            return $this->owner->belongsToComponent($component, $classOnly);
        }

        Deprecation::notice('4.0', 'Please use belongsTo() instead');
        return $this->owner->belongsTo(null, $classOnly);
    }

    /**
     * @deprecated 4.0 Method has been replaced by hasMany() and hasManyComponent()
     * @param string $component
     * @param bool $classOnly
     * @return array|null
     */
    public function has_many($component = null, $classOnly = true)
    {
        if ($component) {
            Deprecation::notice('4.0', 'Please use hasManyComponent() instead');
            return $this->owner->hasManyComponent($component, $classOnly);
        }

        Deprecation::notice('4.0', 'Please use hasMany() instead');
        return $this->owner->hasMany(null, $classOnly);
    }

    /**
     * @deprecated 4.0 Method has been replaced by manyManyExtraFields() and
     *                 manyManyExtraFieldsForComponent()
     * @param string $component
     * @return array
     */
    public function many_many_extraFields($component = null)
    {
        if ($component) {
            Deprecation::notice('4.0', 'Please use manyManyExtraFieldsForComponent() instead');
            return $this->owner->manyManyExtraFieldsForComponent($component);
        }

        Deprecation::notice('4.0', 'Please use manyManyExtraFields() instead');
        return $this->owner->manyManyExtraFields();
    }

    /**
     * @deprecated 4.0 Method has been renamed to manyMany()
     * @param string $component
     * @return array|null
     */
    public function many_many($component = null)
    {
        if ($component) {
            Deprecation::notice('4.0', 'Please use manyManyComponent() instead');
            return $this->owner->manyManyComponent($component);
        }

        Deprecation::notice('4.0', 'Please use manyMany() instead');
        return $this->owner->manyMany();
    }

    /**
     * @deprecated
     */
    public function Aggregate($class = null)
    {
        Deprecation::notice('4.0', 'Call aggregate methods on a DataList directly instead. In templates'
            . ' an example of the new syntax is &lt% cached List(Member).max(LastEdited) %&gt instead'
            . ' (check partial-caching.md documentation for more details.)');

        if ($class) {
            $list = new DataList($class);
            $list->setDataModel(DataModel::inst());
        } else if (isset($this->owner)) {
            $list = new DataList(get_class($this->owner));
            $list->setDataModel($this->owner->model);
        } else {
            throw new \InvalidArgumentException("DataObject::aggregate() must be called as an instance method or passed"
                . " a classname");
        }
        return $list;
    }

    /**
     * @deprecated
     */
    public function RelationshipAggregate($relationship)
    {
        Deprecation::notice('4.0', 'Call aggregate methods on a relationship directly instead.');

        return $this->owner->$relationship();
    }
}