<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles sur les Objectifs de Développement Durable - Explore Beyond</title>
    <link rel="stylesheet" href="styles_articles.css"> <!-- Assurez-vous d'ajouter un lien vers votre fichier CSS -->
    <style>
        .description {
            display: none; /* Cacher toutes les descriptions par défaut */
        }
    </style>
</head>

<body>
    <header>
        <h1>Articles sur les Objectifs de Développement Durable</h1>
    </header>
    <main>
        <div class="article-wrapper">
            <article>
                <img src="article1.jpeg" alt="Article 1">
                <h2>Voyager de manière responsable : 5 conseils pratiques</h2>
                <button onclick="toggleDescription(1)">Lire l'article</button> <!-- Utilisation d'un bouton pour lire l'article -->
                <div id="description1" class="description">
                    <p>Voyager de manière responsable est une préoccupation croissante pour les voyageurs conscients de l'impact de leurs actions sur l'environnement et les communautés locales. En tant qu'expert du secteur du voyage, je propose cinq conseils pratiques pour aider les voyageurs à adopter une approche plus responsable lors de leurs aventures. Ces conseils comprennent des stratégies pour réduire l'empreinte carbone de vos voyages, soutenir les économies locales en choisissant des hébergements et des produits locaux, préserver la biodiversité en évitant les activités touristiques dommageables pour les écosystèmes fragiles, et respecter les cultures autochtones en apprenant sur leurs traditions et en les respectant lors de vos interactions avec les communautés locales. En intégrant ces principes dans nos voyages, nous pouvons contribuer à un tourisme plus durable et positif pour notre planète et ses habitants.</p>
                    <button onclick="hideDescription(1)">Cacher la description</button> <!-- Bouton pour cacher la description -->
                </div>
            </article>
            <article>
                <img src="article2.jpeg" alt="Article 2">
                <h2>Impact des voyages sur les communautés locales</h2>
                <button onclick="toggleDescription(2)">Lire l'article</button>
                <div id="description2" class="description">
                    <p>Découvrez comment le tourisme peut avoir un impact positif ou négatif sur les communautés locales à travers le monde. En analysant des études de cas provenant de différentes destinations, nous explorons les défis et les opportunités que le tourisme apporte aux communautés locales. De la création d'emplois et de sources de revenus à la préservation des traditions culturelles, en passant par les problèmes de sur-tourisme et de gentrification, cet article examine les divers aspects de l'interaction entre le tourisme et les communautés locales.</p>
                    <button onclick="hideDescription(2)">Cacher la description</button>
                </div>
            </article>
            <article>
                <img src="article3.jpeg" alt="Article 3">
                <h2>Le rôle de l'agriculture durable dans la préservation de la biodiversité</h2>
                <button onclick="toggleDescription(3)">Lire l'article</button>
                <div id="description3" class="description">
                    <p>L'agriculture durable joue un rôle essentiel dans la préservation de la biodiversité. En adoptant des pratiques agricoles respectueuses de l'environnement telles que l'agroforesterie, la rotation des cultures et la gestion intégrée des ravageurs, les agriculteurs peuvent contribuer à la conservation des écosystèmes naturels et à la protection des espèces menacées. Cet article explore l'importance de l'agriculture durable dans la préservation de la biodiversité et propose des solutions pour promouvoir des systèmes alimentaires plus durables.</p>
                    <button onclick="hideDescription(3)">Cacher la description</button>
                </div>
            </article>
            <article>
                <img src="article4.jpeg" alt="Article 4">
                <h2>L'importance de l'éducation environnementale pour les jeunes générations</h2>
                <button onclick="toggleDescription(4)">Lire l'article</button>
                <div id="description4" class="description">
                    <p>L'éducation environnementale est essentielle pour sensibiliser les jeunes générations aux enjeux environnementaux et encourager des comportements durables. En intégrant des programmes éducatifs sur la conservation de la nature, le changement climatique et la durabilité dans les écoles et les universités, nous pouvons inspirer les futurs leaders à prendre des mesures pour protéger notre planète. Cet article examine l'importance de l'éducation environnementale et propose des stratégies pour renforcer les initiatives éducatives à tous les niveaux.</p>
                    <button onclick="hideDescription(4)">Cacher la description</button>
                </div>
            </article>
            <article>
                <img src="article5.jpeg" alt="Article 5">
                <h2>Les avantages économiques des énergies renouvelables</h2>
                <button onclick="toggleDescription(5)">Lire l'article</button>
                <div id="description5" class="description">
                    <p>Les énergies renouvelables offrent de nombreux avantages économiques en plus de leurs avantages environnementaux. En réduisant la dépendance aux combustibles fossiles, les énergies renouvelables contribuent à la création d'emplois, à la croissance économique et à la sécurité énergétique. Cet article explore les divers aspects des avantages économiques des énergies renouvelables, y compris les investissements dans les infrastructures, les opportunités d'innovation et les marchés émergents dans le secteur des énergies propres.</p>
                    <button onclick="hideDescription(5)">Cacher la description</button>
                </div>
            </article>
            <article>
                <img src="article6.jpeg" alt="Article 6">
                <h2>Comment le recyclage contribue à réduire les déchets plastiques dans les océans</h2>
                <button onclick="toggleDescription(6)">Lire l'article</button>
                <div id="description6" class="description">
                    <p>Le recyclage joue un rôle crucial dans la lutte contre la pollution plastique dans les océans. En recyclant les déchets plastiques, nous pouvons réduire la quantité de plastique qui se retrouve dans les écosystèmes marins et préserver la biodiversité marine. Cet article examine l'impact du recyclage sur la réduction des déchets plastiques dans les océans et propose des solutions pour encourager le recyclage à l'échelle mondiale.</p>
                    <button onclick="hideDescription(6)">Cacher la description</button>
                </div>
            </article>
        </div>
    </main>
    <footer>
        <!-- Pied de page -->
    </footer>
    <script>
        function toggleDescription(articleId) {
            var description = document.getElementById('description' + articleId);
            if (description.style.display === 'none') {
                description.style.display = 'block'; // Afficher la description si elle est cachée
            } else {
                description.style.display = 'none'; // Cacher la description si elle est affichée
            }
        }

        function hideDescription(articleId) {
            var description = document.getElementById('description' + articleId);
            description.style.display = 'none'; // Cacher la description
        }
    </script>
</body>

</html>
