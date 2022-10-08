<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormulaireRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: FormulaireRepository::class)]
/**
 * @ApiResource(
 *     denormalizationContext={
 *        "disable_type_enforcement"=true
 *     }
 * )
 */
class Formulaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $titre_site;

    #[ORM\Column(type: 'string', length: 100)]
    private $nom_user;

    #[ORM\Column(type: 'string', length: 100)]
    private $prenom_user;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $service_user;

    #[ORM\Column(type: 'string', length: 100)]
    private $mail_user;

    #[ORM\Column(type: 'float', nullable: true)]
    private $tel_user;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $projet_nom;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $type_form;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $public_vise;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $public_vise2;

    #[ORM\Column(type: 'text')]
    private $descriptif_form;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $porteur_form;

    #[ORM\Column(type: 'string', length: 100)]
    private $responsable_form;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $url_form;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $nom_contributeurs;

    #[ORM\Column(type: 'boolean')]
    private $externalisee_form;

    #[ORM\Column(type: 'boolean')]
    private $concurrence_form;

    #[ORM\Column(type: 'text', nullable: true)]
    private $contenus_form;

    #[ORM\Column(type: 'boolean')]
    private $financement_form;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_fin_form;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_archivage_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $statistique_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $recharche_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $actualites_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $formulaires_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $partage_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $media_form;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $multilangue_form;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $multilangue_form2;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $autre_form;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $autre_form2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $status;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_status;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comments_status;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $approve_status;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $multilangue_form3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreSite(): ?string
    {
        return $this->titre_site;
    }

    public function setTitreSite(?string $titre_site): self
    {
        $this->titre_site = $titre_site;

        return $this;
    }

    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getServiceUser(): ?string
    {
        return $this->service_user;
    }

    public function setServiceUser(?string $service_user): self
    {
        $this->service_user = $service_user;

        return $this;
    }

    public function getMailUser(): ?string
    {
        return $this->mail_user;
    }

    public function setMailUser(string $mail_user): self
    {
        $this->mail_user = $mail_user;

        return $this;
    }

    public function getTelUser(): ?float
    {
        return $this->tel_user;
    }

    public function setTelUser(?float $tel_user): self
    {
        $this->tel_user = $tel_user;

        return $this;
    }

    public function getProjetNom(): ?string
    {
        return $this->projet_nom;
    }

    public function setProjetNom(?string $projet_nom): self
    {
        $this->projet_nom = $projet_nom;

        return $this;
    }

    public function getTypeForm(): ?string
    {
        return $this->type_form;
    }

    public function setTypeForm(?string $type_form): self
    {
        $this->type_form = $type_form;

        return $this;
    }

    public function getPublicVise(): ?string
    {
        return $this->public_vise;
    }

    public function setPublicVise(?string $public_vise): self
    {
        $this->public_vise = $public_vise;

        return $this;
    }

    public function getPublicVise2(): ?string
    {
        return $this->public_vise2;
    }

    public function setPublicVise2(?string $public_vise2): self
    {
        $this->public_vise2 = $public_vise2;

        return $this;
    }

    public function getDescriptifForm(): ?string
    {
        return $this->descriptif_form;
    }

    public function setDescriptifForm(string $descriptif_form): self
    {
        $this->descriptif_form = $descriptif_form;

        return $this;
    }

    public function getPorteurForm(): ?string
    {
        return $this->porteur_form;
    }

    public function setPorteurForm(?string $porteur_form): self
    {
        $this->porteur_form = $porteur_form;

        return $this;
    }

    public function getResponsableForm(): ?string
    {
        return $this->responsable_form;
    }

    public function setResponsableForm(string $responsable_form): self
    {
        $this->responsable_form = $responsable_form;

        return $this;
    }

    public function getUrlForm(): ?string
    {
        return $this->url_form;
    }

    public function setUrlForm(?string $url_form): self
    {
        $this->url_form = $url_form;

        return $this;
    }

    public function getNomContributeurs(): ?string
    {
        return $this->nom_contributeurs;
    }

    public function setNomContributeurs(?string $nom_contributeurs): self
    {
        $this->nom_contributeurs = $nom_contributeurs;

        return $this;
    }

    public function getExternaliseeForm(): ?bool
    {
        return $this->externalisee_form;
    }

    public function setExternaliseeForm(bool $externalisee_form): self
    {
        $this->externalisee_form = $externalisee_form;

        return $this;
    }

    public function getConcurrenceForm(): ?bool
    {
        return $this->concurrence_form;
    }

    public function setConcurrenceForm(bool $concurrence_form): self
    {
        $this->concurrence_form = $concurrence_form;

        return $this;
    }

    public function getContenusForm(): ?string
    {
        return $this->contenus_form;
    }

    public function setContenusForm(?string $contenus_form): self
    {
        $this->contenus_form = $contenus_form;

        return $this;
    }

    public function getFinancementForm(): ?bool
    {
        return $this->financement_form;
    }

    public function setFinancementForm(bool $financement_form): self
    {
        $this->financement_form = $financement_form;

        return $this;
    }

    public function getDateFinForm(): ?\DateTimeInterface
    {
        return $this->date_fin_form;
    }

    public function setDateFinForm(?\DateTimeInterface $date_fin_form): self
    {
        $this->date_fin_form = $date_fin_form;

        return $this;
    }

    public function getDateArchivageForm(): ?\DateTimeInterface
    {
        return $this->date_archivage_form;
    }

    public function setDateArchivageForm(?\DateTimeInterface $date_archivage_form): self
    {
        $this->date_archivage_form = $date_archivage_form;

        return $this;
    }

    public function getStatistiqueForm(): ?bool
    {
        return $this->statistique_form;
    }

    public function setStatistiqueForm(?bool $statistique_form): self
    {
        $this->statistique_form = $statistique_form;

        return $this;
    }

    public function getRecharcheForm(): ?bool
    {
        return $this->recharche_form;
    }

    public function setRecharcheForm(?bool $recharche_form): self
    {
        $this->recharche_form = $recharche_form;

        return $this;
    }

    public function getActualitesForm(): ?bool
    {
        return $this->actualites_form;
    }

    public function setActualitesForm(?bool $actualites_form): self
    {
        $this->actualites_form = $actualites_form;

        return $this;
    }

    public function getFormulairesForm(): ?bool
    {
        return $this->formulaires_form;
    }

    public function setFormulairesForm(?bool $formulaires_form): self
    {
        $this->formulaires_form = $formulaires_form;

        return $this;
    }

    public function getPartageForm(): ?bool
    {
        return $this->partage_form;
    }

    public function setPartageForm(?bool $partage_form): self
    {
        $this->partage_form = $partage_form;

        return $this;
    }

    public function getMediaForm(): ?bool
    {
        return $this->media_form;
    }

    public function setMediaForm(?bool $media_form): self
    {
        $this->media_form = $media_form;

        return $this;
    }

    public function getMultilangueForm(): ?bool
    {
        return $this->multilangue_form;
    }

    public function setMultilangueForm(?bool $multilangue_form): self
    {
        $this->multilangue_form = $multilangue_form;

        return $this;
    }

    public function getMultilangueForm2(): ?string
    {
        return $this->multilangue_form2;
    }

    public function setMultilangueForm2(?string $multilangue_form2): self
    {
        $this->multilangue_form2 = $multilangue_form2;

        return $this;
    }

    public function getAutreForm(): ?bool
    {
        return $this->autre_form;
    }

    public function setAutreForm(?bool $autre_form): self
    {
        $this->autre_form = $autre_form;

        return $this;
    }

    public function getAutreForm2(): ?string
    {
        return $this->autre_form2;
    }

    public function setAutreForm2(?string $autre_form2): self
    {
        $this->autre_form2 = $autre_form2;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->nom_user. ' ' .$this->prenom_user;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateStatus(): ?\DateTimeInterface
    {
        return $this->date_status;
    }

    public function setDateStatus(?\DateTimeInterface $date_status): self
    {
        $this->date_status = $date_status;

        return $this;
    }

    public function getCommentsStatus(): ?string
    {
        return $this->comments_status;
    }

    public function setCommentsStatus(?string $comments_status): self
    {
        $this->comments_status = $comments_status;

        return $this;
    }

    public function getApproveStatus(): ?bool
    {
        return $this->approve_status;
    }

    public function setApproveStatus(?bool $approve_status): self
    {
        $this->approve_status = $approve_status;

        return $this;
    }

    public function getMultilangueForm3(): ?string
    {
        return $this->multilangue_form3;
    }

    public function setMultilangueForm3(?string $multilangue_form3): self
    {
        $this->multilangue_form3 = $multilangue_form3;

        return $this;
    }


}
