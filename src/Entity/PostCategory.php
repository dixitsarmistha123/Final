<?php

namespace App\Entity;

use App\Repository\PostCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostCategoryRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class PostCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $category_name;

    /**
     * @ORM\ManyToOne(targetEntity=PostCategory::class, inversedBy="postCategories")
     */
    public $parent;

    
    /**
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @ORM\Column(type="boolean")
     */
    public $status;

    /**
     * @ORM\Column(type="datetime")
     */
    public $created;

    /**
     * @ORM\Column(type="datetime")
     */
    public $updated;

    /**
     * @ORM\OneToMany(targetEntity=PostCategory::class, mappedBy="parent_id")
     */
    public $postCategories;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="post_category")
     */
    public $posts;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="PostCategory")
     */
    public $products;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $CategoryThumbnail;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $AvailableFlavours;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AvailableShapes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AvailableTypes;

    public function __construct()
    {
        $this->postCategories = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }
   
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getParentId(): ?self
    {
        return $this->parent_id;
    }

    public function setParentId(?self $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPostCategories(): Collection
    {
        return $this->postCategories;
    }

    public function addPostCategory(self $postCategory): self
    {
        if (!$this->postCategories->contains($postCategory)) {
            $this->postCategories[] = $postCategory;
            $postCategory->setParentId($this);
        }

        return $this;
    }

    public function removePostCategory(self $postCategory): self
    {
        if ($this->postCategories->removeElement($postCategory)) {
            // set the owning side to null (unless already changed)
            if ($postCategory->getParentId() === $this) {
                $postCategory->setParentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setPostCategory($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getPostCategory() === $this) {
                $post->setPostCategory(null);
            }
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function __toString(){
        return trim($this->category_name);
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

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue () {
        $this->created = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setUpdatedValue () {
        $this->updated = new \DateTime();
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setPostCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getPostCategory() === $this) {
                $product->setPostCategory(null);
            }
        }

        return $this;
    }

    public function getCategoryThumbnail(): ?string
    {
        return $this->CategoryThumbnail;
    }

    public function setCategoryThumbnail(?string $CategoryThumbnail): self
    {
        $this->CategoryThumbnail = $CategoryThumbnail;

        return $this;
    }

    public function getAvailableFlavours(): ?string
    {
        return $this->AvailableFlavours;
    }

    public function setAvailableFlavours(?string $AvailableFlavours): self
    {
        $this->AvailableFlavours = $AvailableFlavours;

        return $this;
    }

    public function getAvailableShapes(): ?string
    {
        return $this->AvailableShapes;
    }

    public function setAvailableShapes(?string $AvailableShapes): self
    {
        $this->AvailableShapes = $AvailableShapes;

        return $this;
    }

    public function getAvailableTypes(): ?string
    {
        return $this->AvailableTypes;
    }

    public function setAvailableTypes(?string $AvailableTypes): self
    {
        $this->AvailableTypes = $AvailableTypes;

        return $this;
    }
}
