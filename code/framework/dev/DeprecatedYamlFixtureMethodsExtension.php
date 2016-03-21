<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 16:50
 */
class DeprecatedYamlFixtureMethodsExtension extends DataExtension
{

    /**
     * @var FixtureFactory
     * @deprecated 3.1 Use writeInto() and FixtureFactory instead
     */
    protected $factory;

    /**
     * Get the ID of an object from the fixture.
     *
     * @deprecated 4.0 Use writeInto() and FixtureFactory accessors instead
     *
     * @param $className The data class, as specified in your fixture file.  Parent classes won't work
     * @param $identifier The identifier string, as provided in your fixture file
     */
    public function idFromFixture($className, $identifier) {
        Deprecation::notice('4.0', 'Use writeInto() and FixtureFactory accessors instead');

        if(!$this->owner->factory) $this->owner->factory = Injector::inst()->create('FixtureFactory');
        return $this->owner->factory->getId($className, $identifier);

    }

    /**
     * Return all of the IDs in the fixture of a particular class name.
     *
     * @deprecated 4.0 Use writeInto() and FixtureFactory accessors instead
     *
     * @return A map of fixture-identifier => object-id
     */
    public function allFixtureIDs($className) {
        Deprecation::notice('4.0', 'Use writeInto() and FixtureFactory accessors instead');

        if(!$this->owner->factory) $this->owner->factory = Injector::inst()->create('FixtureFactory');
        return $this->owner->factory->getIds($className);
    }

    /**
     * Get an object from the fixture.
     *
     * @deprecated 4.0 Use writeInto() and FixtureFactory accessors instead
     *
     * @param $className The data class, as specified in your fixture file.  Parent classes won't work
     * @param $identifier The identifier string, as provided in your fixture file
     */
    public function objFromFixture($className, $identifier) {
        Deprecation::notice('4.0', 'Use writeInto() and FixtureFactory accessors instead');

        if(!$this->owner->factory) $this->owner->factory = Injector::inst()->create('FixtureFactory');
        return $this->owner->factory->get($className, $identifier);
    }

    /**
     * Load a YAML fixture file into the database.
     * Once loaded, you can use idFromFixture() and objFromFixture() to get items from the fixture.
     *
     * Caution: In order to support reflexive relations which need a valid object ID,
     * the record is written twice: first after populating all non-relational fields,
     * then again after populating all relations (has_one, has_many, many_many).
     *
     * @deprecated 4.0 Use writeInto() and FixtureFactory instance instead
     */
    public function saveIntoDatabase(DataModel $model) {
        Deprecation::notice('4.0', 'Use writeInto() and FixtureFactory instance instead');

        if(!$this->owner->factory) $this->owner->factory = Injector::inst()->create('FixtureFactory');
        $this->owner->writeInto($this->owner->factory);
    }

}

/**
 * This class is maintained for backwards-compatibility only. Please use the {@link GDBackend} class instead.
 *
 * @package framework
 * @subpackage filesystem
 */
class GD extends GDBackend {

    /**
     * @deprecated 4.0 Use the "GDBackend.default_quality" config setting instead
     */
    public static function set_default_quality($quality) {
        Deprecation::notice('4.0', 'Use the "GDBackend.default_quality" config setting instead');
        GDBackend::set_default_quality($quality);
    }
}
