# Manuel du PFE

## Convention de nommage CSS
| Élément             | Convention proposée       | Exemple                                           |
| ------------------- | ------------------------- | ------------------------------------------------- |
| **Template**        | `.t-[nom]`                | `.t-chapter`, `.t-manual`                         |
| **Zone / Layout**   | `.l-[zone]`               | `.l-header`, `.l-sidebar`, `.l-main`, `.l-footer` |
| **Composant UI**    | `.c-[composant]`          | `.c-encadre`, `.c-breadcrumb`, `.c-navigation`    |
| **Bloc spécifique** | `.b-[fonction]`           | `.b-testimony`, `.b-definition`, `.b-citation`    |
| **État**            | `is-[etat]`, `has-[etat]` | `.is-active`, `.has-children`, `.is-current`      |
| **Version**         | `.v-web`, `.v-print`      | Pour différencier les UI                          |

## 🧱 Structure typographique

| Usage	| Typo recommandée	| Justification
| ------------------- | ------------------------- | ------------------------------------------------- |
| Titraille principale	| Quicksand ou Work Sans	| Géométrique et ronde, apporte de la chaleur et modernité
| Sous-titres, niveaux secondaires	| Inter	| Très lisible à l’écran, sobre sans être rigide
| Texte courant	| Spectral, Source Serif Pro ou Atkinson Hyperlegible	| Pour une lecture confortable sur écran comme à l’impression
| Navigation / UI	| Cabin ou Roboto	| Neutre et discrète pour les menus, boutons, sommaire

## 🖌 Palette chromatique
   Une palette modulaire autour du vert anis (Media Design Lab), accompagnée de couleurs saturées, fraîches et contrastées pour segmenter les types de contenu.
   
| Fonction	| Couleur	| Exemple
| ------------------- | ------------------------- | ------------------------------------------------- |
| Identité globale	| Vert anis #C0D000	| Signets, boutons actifs, icônes
| Chapitre 1	| Bleu sarcelle #009688	| Apaisant et professionnel
| Chapitre 2	| Saumon #FF7043	| Chaleureux, stimulant
| Chapitre 3	| Violet lavande #7E57C2	| Créatif, bien distinct
| Encadré "À faire"	| Vert menthe #66BB6A	| Énergie positive
| Encadré "Exemple étudiant"	| Framboise claire #EC407A	| Plus incarné, narratif
| Encadré "Définition"	| Bleu acier #42A5F5	| Ton factuel, académique
| Encadré "Référence"	| Gris foncé #424242 + icône ⚖	| Discret, sérieux

→ Ces couleurs sont déclinables facilement en fond clair + bande latérale + icône associée

