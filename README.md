# stars_rating
Proyecto de prueba StarRate
Setup:

1- Clonar el repositorio con el comando: git clone git@github.com:I-Love-Symfony/stars_rating.git

2- Instalar dependencias:
  - composer update
  - yarn install --force 
  
3- Agregar la propiedad rating a la entidad deseada:

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $rating;
	.
	.
	.
	public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }
	
4- Agregar el campo al Form deseado:	

	.
	.
	use App\Form\Type\StarRateType;
	.
	.
	.
	$builder
            ->add('rating', StarRateType::class)
    ;
	.
	.
	.
	Las opciones configurables son:
	- half(boolean) se utiliza para definir si se podrá agregar ratings de media estrella o no
	- size(integer) se utiliza para definir el tamaño de las estrellas (Ej: 30, 40 o 50)
	- count (integer) se utiliza para definir la cantidad de estrellas (Ej: 5, 7, o 10)
	
5- Pintar el campo en el formulario:
   .
   .
   .
   {{ form_row(form.rating) }}
   .
   .
   .
   
6- Sobreescribir el tema del formulario en el archivo config/packages/twig.yaml:
   twig:
    default_path: '%kernel.project_dir%/templates'
    form_themes:
        - 'form/custom_types.html.twig'   

   
