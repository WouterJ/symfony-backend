<?php
/**
 * /src/App/Entity/Interfaces/EntityInterface.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\Entity\Interfaces;

/**
 * Interface Entity
 *
 * @category    Interface
 * @package     App\Entity\Interfaces
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
interface EntityInterface
{
    /**
     * Simple method to get 'string' presentation about the current record.
     *
     * @return  string
     */
    public function getRecordTitle();
}
