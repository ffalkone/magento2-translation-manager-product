<?php
declare(strict_types=1);

namespace Eurotext\TranslationManagerProduct\Model;

use Eurotext\TranslationManagerProduct\Api\Data\ProjectProductInterface;
use Eurotext\TranslationManagerProduct\Model\ResourceModel\ProjectProductCollection;
use Eurotext\TranslationManagerProduct\Model\ResourceModel\ProjectProductResource;
use Eurotext\TranslationManagerProduct\Setup\EntitySchema\ProjectProductSchema;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class ProjectProduct
    extends AbstractModel
    implements ProjectProductInterface, IdentityInterface
{
    const CACHE_TAG = 'eurotext_project_product';

    protected function _construct()
    {
        $this->_init(ProjectProductResource::class);
        $this->_setResourceModel(ProjectProductResource::class, ProjectProductCollection::class);
    }

    public function getId()
    {
        return parent::getId() === null ? null : (int)parent::getId();
    }

    public function getProjectId(): int
    {
        return (int)$this->getData(ProjectProductSchema::PROJECT_ID) ?: 0;
    }

    public function setProjectId(int $projectId)
    {
        $this->setData(ProjectProductSchema::PROJECT_ID, $projectId);
    }

    public function getProductId(): int
    {
        return (int)$this->getData(ProjectProductSchema::PRODUCT_ID) ?: 0;
    }

    public function setProductId(int $productId)
    {
        $this->setData(ProjectProductSchema::PRODUCT_ID, $productId);
    }

    public function getExtId(): int
    {
        return (int)$this->getData(ProjectProductSchema::EXT_ID) ?: 0;
    }

    public function setExtId(int $extId)
    {
        $this->setData(ProjectProductSchema::EXT_ID, $extId);
    }

    public function getStatus(): string
    {
        return $this->getData(ProjectProductSchema::STATUS) ?: '';
    }

    public function setStatus(string $status)
    {
        $this->setData(ProjectProductSchema::STATUS, $status);
    }

    public function getCreatedAt(): string
    {
        return $this->getData(ProjectProductSchema::CREATED_AT) ?: '';
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->setData(ProjectProductSchema::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->getData(ProjectProductSchema::UPDATED_AT) ?: '';
    }

    public function setUpdatedAt(string $updatedAt)
    {
        $this->setData(ProjectProductSchema::UPDATED_AT, $updatedAt);
    }

    public function getLastError(): string
    {
        return $this->getData(ProjectProductSchema::LAST_ERROR) ?: '';
    }

    public function setLastError(string $lastError)
    {
        $this->setData(ProjectProductSchema::LAST_ERROR, $lastError);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

}
