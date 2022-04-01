<?php


namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Brand;
use App\Entity\Product;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $brand1 = new Brand();
        $brand1->setName('Apple');

        $brand2 = new Brand();
        $brand2->setName('Samsung');

        $brand3 = new Brand();
        $brand3->setName('Sony');

        $manager->persist($brand1);
        $manager->persist($brand2);
        $manager->persist($brand3);


        // 5 users
        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $password = $this->passwordHasher->hashPassword($user, 'password');
            $user->setPassword($password);
            $user->setName("nom$i")
                ->setEmail(sprintf("%d@email.com", $i))
                ->setRoles([]);

            $manager->persist($user);

            //between 1 and 3 products)
            /*     for ($j = 1; $j <= mt_rand(1, 3); $j++) {
                $product = new Product();
                $product->setDescription(sprintf("description+%d", $j))
                    ->setModel(sprintf("model%d", $j))
                    ->setBrand(${'brand' . rand(1, 3)})
                    ->setClient($user);
                $manager->persist($product);
            }*/
            $product1 = new Product();
            $product1->setDescription('Une puce surpuissante. La vitesse 5G. Un double appareil photo de pointe. Une face avant Ceramic Shield plus résistante que le verre de n’importe quel smart­phone. Et un superbe écran OLED lumineux. L’iPhone 12 a tout, en deux tailles parfaites.')
                ->setModel('iPhone12')
                ->setBrand($brand1)
                ->setClient($user);
            $manager->persist($product1);

            $product2 = new Product();
            $product2->setDescription('Plus abordable et plus récent d\'Apple. Suivant la ligne de la génération X, l\'iPhone XR est un smartphone tout écran qui met en oeuvre la technologie de pointe d\'Apple à un prix inférieur.6 pouces en plein écranUn panneau de 6,1 pouces étoiles dans ce modèle Apple. Celui nommé Liquid Retina est un écran LCD IPS qui affiche une gamme de couleurs étendue et réaliste. Il a une densité de 326 pixels par pouce et s\'étend jusqu\'aux bords, offrant un aspect plein écran.Un processeur capable de tout. L\'iPhone XR utilise le même processeur que l\'iPhone XS. C\'est l\'Apple A12 Bionic, une puce efficace de dernière génération qui garantit vitesse et fluidité. Entre autres choses, cette puissance est utilisée pour exécuter des jeux 3D avec une charge graphique importante, rationaliser le traitement des photos avec le HDR intelligent (réduire le bruit, ajouter des détails aux ombres ou améliorer les zones claires de vos photos) ou profiter de la réalité augmentée.Fabriqué avec des matériaux extraordinaires')
                ->setModel('iPhone XR 64 GO')
                ->setBrand($brand1)
                ->setClient($user);
            $manager->persist($product2);

            $product3 = new Product();
            $product3->setDescription('Le Samsung Galaxy S22 Ultra est un smartphone d’exception.
                    Avec l’ADN du Galaxy S en son cœur, il embarque toute l’expérience d’un Galaxy Note avec un cadre en aluminium poli, une conception symétrique et un bloc photo intégré à la face arrière.
                    Pour un look unique en son genre')
                ->setModel('Samsung Galaxy S22 Ultra')
                ->setBrand($brand2)
                ->setClient($user);
            $manager->persist($product3);

            $product4 = new Product();
            $product4->setDescription('Le tout nouveau Galaxy S10 condense la quintessence du savoir-faire de Samsung en matière de mobilité, avec son design extrêmement séduisant et résistant, une prise en main sans pareil et des performances qui repoussent encore plus loin les frontières des usages mobiles. Bienvenu dans une nouvelle ère. Design épuré, des courbes lisses et sans bordures, le Galaxy S10 présente des performances solides avec un processeur octo-core, 8Go de mémoire RAM et un appareil photo triple capteurs avec mode super slow motion qui n’a pas fini de vous éblouir par sa qualité d’image ! Version Android Oreo 9 Pie, mode HDR 10+, écran Super Amoled, reconnaissance faciale et lecteur d’empreinte ultrasonique sous l\'écran, le magnifique Galaxy S10 saura vous surprendre et vous émerveiller… Vivez une expérience visuelle incroyable et en totale immersion !')
                ->setModel('Samsung Galaxy S10')
                ->setBrand($brand2)
                ->setClient($user);
            $manager->persist($product4);

            $product5 = new Product();
            $product5->setDescription('Un design soigné avec la technologie dont vous avez besoin
                        La taille parfaite pour tenir dans votre main ou votre poche tout en intégrant les technologies Sony les plus récentes. Design compact | Écran 21:9 CinemaWide™ | Eye AF en temps réel')
                ->setModel('Xperia 5 II')
                ->setBrand($brand3)
                ->setClient($user);
            $manager->persist($product5);

            $product6 = new Product();
            $product6->setDescription('Téléphone mobile à batterie longue durée, résistant à l’eau. La 5G s\'immisce dans votre quotidien depuis le creux de votre main.Rapidité de la 5G1, performances incroyables, grande autonomie de batterie, design élégant tenant parfaitement dans la main : goûtez à la liberté absolue.')
                ->setModel('Xperia  10 III ')
                ->setBrand($brand3)
                ->setClient($user);
            $manager->persist($product6);

            $product7 = new Product();
            $product7->setDescription('Le smartphone Xperia 1 II redéfinit les standards en termes de rapidité. Il intègre les dernières technologies de pointe, la connectivité 5G1 et un appareil photo, développé en collaboration avec les ingénieurs Sony Alpha, qui offre une mise au point exceptionnellement rapide pour un smartphone. Et grâce à son écran 4K HDR OLED de 6,5” au format 21:9 CinemaWide2, profitez d\'une qualité d\'affichage digne du cinéma.')
                ->setModel('Xperia 1 II')
                ->setBrand($brand3)
                ->setClient($user);
            $manager->persist($product7);

            $product8 = new Product();
            $product8->setDescription('Écran Super Retina HD de 5,8 pouces avec HDR et True Tone1. Design en verre et acier inoxydable.Résistant à l’eau jusqu’à 1 mètre de profondeur pendant 30 minutes maximum (IP67)4.Double appareil photo 12 Mpx (téléobjectif et grand-angle) avec mode Portrait, Auto HDR et vidéo 4K jusqu’à 60 i/s')
                ->setModel('iPhone X')
                ->setBrand($brand1)
                ->setClient($user);
            $manager->persist($product8);




            //between 1 and 10 customers
            for ($k = 1; $k <= mt_rand(1, 10); $k++) {
                $customer = new Customer();
                $customer->setFirstname("Prénom$k")
                    ->setLastname("Nom$k")
                    ->setEmail(sprintf("%d@email.com", $k))
                    ->setPhone("0" . rand(125698754, 985478547))
                    ->setClient($user);
                $manager->persist($customer);
            }
        }

        $manager->flush();
    }
}
