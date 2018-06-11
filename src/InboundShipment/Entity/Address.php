<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

/**
 * Postal address information.
 */
final class Address implements MetadataInterface
{
    /**
     * @var string
     */
    public $Name;

    /**
     * @var string
     */
    public $AddressLine1;

    /**
     * @var string
     */
    public $AddressLine2;

    /**
     * @var string
     */
    public $City;

    /**
     * @var string
     */
    public $DistrictOrCounty;

    /**
     * @var string
     */
    public $StateOrProvinceCode;

    /**
     * @var string
     */
    public $CountryCode;

    /**
     * @var string
     */
    public $PostalCode;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'Name'                  => ['type' => 'scalar'],
            'AddressLine1'          => ['type' => 'scalar'],
            'AddressLine2'          => ['type' => 'scalar'],
            'City'                  => ['type' => 'scalar'],
            'DistrictOrCounty'      => ['type' => 'scalar'],
            'StateOrProvinceCode'   => ['type' => 'scalar'],
            'CountryCode'           => ['type' => 'scalar'],
            'PostalCode'            => ['type' => 'scalar'],
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return Address
     */
    public function setName(string $Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->AddressLine1;
    }

    /**
     * @param string $AddressLine1
     * @return Address
     */
    public function setAddressLine1(string $AddressLine1)
    {
        $this->AddressLine1 = $AddressLine1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->AddressLine2;
    }

    /**
     * @param string $AddressLine2
     * @return Address
     */
    public function setAddressLine2(string $AddressLine2)
    {
        $this->AddressLine2 = $AddressLine2;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return Address
     */
    public function setCity(string $City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * @return string
     */
    public function getDistrictOrCounty()
    {
        return $this->DistrictOrCounty;
    }

    /**
     * @param string $DistrictOrCounty
     * @return Address
     */
    public function setDistrictOrCounty(string $DistrictOrCounty)
    {
        $this->DistrictOrCounty = $DistrictOrCounty;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateOrProvinceCode()
    {
        return $this->StateOrProvinceCode;
    }

    /**
     * @param string $StateOrProvinceCode
     * @return Address
     */
    public function setStateOrProvinceCode(string $StateOrProvinceCode)
    {
        $this->StateOrProvinceCode = $StateOrProvinceCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     * @return Address
     */
    public function setCountryCode(string $CountryCode)
    {
        $this->CountryCode = $CountryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * @param string $PostalCode
     * @return Address
     */
    public function setPostalCode(string $PostalCode)
    {
        $this->PostalCode = $PostalCode;

        return $this;
    }
}
