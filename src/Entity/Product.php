<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=105)
     */
    public $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $flavour;
    
      /**
     * @ORM\Column(type="string", length=255)
     */
    public $Product_slug;
     
    /**
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @ORM\ManyToOne(targetEntity=PostCategory::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    public $PostCategory;

    
    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('egg', 'eggless')")
     */
    public $product_type ; 

     /**
     * @ORM\Column(type="string", columnDefinition="ENUM('draft', 'pending', 'active', 'inactive', 'trashed')")
     */
    public $product_status;
     
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $ProductThumbail;

    /**
     * @ORM\Column(type="float")
     */
    public $Price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $qty;
 
    
    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $at1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $at2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $at3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $at4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $fat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $Suger;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $at5;

    /**
     * @ORM\Column(type="datetime")
     */
    public $CreatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    public $UpdatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Product")
     */
    public $managedBy;

    /**
     * @ORM\Column(type="string")
     */
    public $weight;

    /**
     * @ORM\Column(type="boolean")
     */
    public $isReturnable;

    /**
     * @ORM\Column(type="boolean")
     */
    public $isCustom;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Home Delivery', 'Pick Up')")
     */
    public $DeliveryType ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFlavour(): ?string
    {
        return $this->flavour;
    }

    public function setFlavour(string $flavour): self
    {
        $this->flavour = $flavour;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPostCategory(): ?PostCategory
    {
        return $this->PostCategory;
    }

    public function setPostCategory(?PostCategory $PostCategory): self
    {
        $this->PostCategory = $PostCategory;

        return $this;
    }

    public function getProductThumbail(): ?string
    {
        return $this->ProductThumbail;
    }

    public function setProductThumbail(?string $ProductThumbail): self
    {
        $this->ProductThumbail = $ProductThumbail;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(?int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getAt1(): ?string
    {
        return $this->at1;
    }

    public function setAt1(?string $at1): self
    {
        $this->at1 = $at1;

        return $this;
    }

    public function getAt2(): ?string
    {
        return $this->at2;
    }

    public function setAt2(?string $at2): self
    {
        $this->at2 = $at2;

        return $this;
    }

    public function getAt3(): ?string
    {
        return $this->at3;
    }

    public function setAt3(?string $at3): self
    {
        $this->at3 = $at3;

        return $this;
    }

    public function getAt4(): ?string
    {
        return $this->at4;
    }

    public function setAt4(?string $at4): self
    {
        $this->at4 = $at4;

        return $this;
    }

    public function getFat(): ?string
    {
        return $this->fat;
    }

    public function setFat(?string $fat): self
    {
        $this->fat = $fat;

        return $this;
    }

    public function getSuger(): ?string
    {
        return $this->Suger;
    }

    public function setSuger(?string $Suger): self
    {
        $this->Suger = $Suger;

        return $this;
    }

    public function getAt5(): ?string
    {
        return $this->at5;
    }

    public function setAt5(?string $at5): self
    {
        $this->at5 = $at5;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    public function getProductType(): ?string
    {
        return $this->product_type;
    }

    public function setProductType(string $product_type): self
    {
        $this->product_type = $product_type;

        return $this;
    }

    public function getProductStatus(): ?string
    {
        return $this->product_status;
    }

    public function setProductStatus(string $product_status): self
    {
        $this->product_status = $product_status;

        return $this;
    }

    public function getManagedBy(): ?User
    {
        return $this->managedBy;
    }

    public function setManagedBy(?User $managedBy): self
    {
        $this->managedBy = $managedBy;

        return $this;
    }

    public function getProductSlug(): ?string
    {
        return $this->Product_slug;
    }

    public function setProductSlug(string $Product_slug): self
    {
        $this->Product_slug = $Product_slug;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getIsReturnable(): ?bool
    {
        return $this->isReturnable;
    }

    public function setIsReturnable(bool $isReturnable): self
    {
        $this->isReturnable = $isReturnable;

        return $this;
    }

    public function getIsCustom(): ?bool
    {
        return $this->isCustom;
    }

    public function setIsCustom(bool $isCustom): self
    {
        $this->isCustom = $isCustom;

        return $this;
    }

    public function getDeliveryType(): ?string
    {
        return $this->DeliveryType;
    }

    public function setDeliveryType(string $DeliveryType): self
    {
        $this->DeliveryType = $DeliveryType;

        return $this;
    }
}
