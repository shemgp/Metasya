<?php

namespace MagicMonkey\Metasya\Schema;


/**
 * Class Schema
 * @package MagicMonkey\Metasya\Schema
 */
class Schema
{

  /**
   * @var
   */
  private $shortcut;

  /**
   * @var null
   */
  private $nameSpace;

  /**
   * @var null
   */
  private $description;

  /**
   * @var
   */
  private $properties;

  /**
   * Schema constructor.
   * @param $shortcut
   * @param $nameSpace
   * @param $description
   */
  public function __construct($shortcut, $nameSpace, $description = null)
  {
    $this->shortcut = $shortcut;
    $this->nameSpace = $nameSpace;
    $this->description = $description;
    $this->properties = array();
  }

  public function buildTargetedMetadata()
  {
    $targetedMetadata = array();
    foreach ($this->properties as $property) {
      if ($property->getNameSpace() != null) {
        $metadataTag = $property->getNameSpace() . ":" . $property->getTagName();
      } else {
        $metadataTag = $this->getNameSpace() . ":" . $property->getTagName();
      }
      array_push($targetedMetadata, $metadataTag);
    }
    return $targetedMetadata;
  }

  /**
   * @param $property
   * @return bool
   */
  public function addProperty($property)
  {
    if ($property instanceof Property) {
      array_push($this->properties, $property);
      return true;
    }
    return false;
  }

  /**
   * @param $property
   * @return bool
   */
  public function removeProperty($property)
  {
    if (($key = array_search($property, $this->properties, true)) !== FALSE) {
      unset($this->properties[$key]);
      return true;
    }
    return false;
  }

  /**
   * @return null
   */
  public function getNameSpace()
  {
    return $this->nameSpace;
  }

  /**
   * @param null $nameSpace
   */
  public function setNameSpace($nameSpace)
  {
    $this->nameSpace = $nameSpace;
  }

  /**
   * @return null
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param null $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getProperties()
  {
    return $this->properties;
  }

  /**
   * @param mixed $properties
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }

  /**
   * @return mixed
   */
  public function getShortcut()
  {
    return $this->shortcut;
  }

  /**
   * @param mixed $shortcut
   */
  public function setShortcut($shortcut)
  {
    $this->shortcut = $shortcut;
  }


}