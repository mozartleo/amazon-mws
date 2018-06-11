<?php

namespace WebPapers\Amazon\InboundShipment\Entity;

use WebPapers\Amazon\Common\Serializer\MetadataInterface;

/**
 * A preparation instruction, and who is reponsible for that preparation.
 */
final class PrepDetails implements MetadataInterface
{
    /** @var PrepInstruction */
    public $PrepInstruction;

    /** @var string */
    public $PrepOwner;

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return [
            'PrepInstruction' => ['type' => 'choice', 'choices' => [
                'Polybagging',
                'BubbleWrapping',
                'Taping',
                'BlackShrinkWrapping',
                'Labeling',
                'HangGarment',
            ]],
            'PrepOwner'       => ['type' => 'choice', 'choices' => ['AMAZON', 'SELLER']],
        ];
    }

    /**
     * @return PrepInstruction
     */
    public function getPrepInstruction()
    {
        return $this->PrepInstruction;
    }

    /**
     * @param PrepInstruction $PrepInstruction
     * @return PrepDetails
     */
    public function setPrepInstruction(PrepInstruction $PrepInstruction)
    {
        $this->PrepInstruction = $PrepInstruction;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrepOwner()
    {
        return $this->PrepOwner;
    }

    /**
     * @param string $PrepOwner
     * @return PrepDetails
     */
    public function setPrepOwner(string $PrepOwner)
    {
        $this->PrepOwner = $PrepOwner;

        return $this;
    }
}
