<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualTourController extends Controller
{
    /**
     * Display the virtual tour
     */
    public function show()
    {
        // Configuration de la visite virtuelle
        $tourConfig = [
            'startPanorama' => 'salon',
            'autoRotate' => false,
            'autoRotateSpeed' => 0.5,
            'enableSound' => true,
            'transitionSpeed' => 1.5,
        ];

        // Configuration des panoramas
        $panoramas = [
            'salon' => [
                'name' => 'Salon',
                'image' => '/images/panorama1.jpg',
                'info' => [
                    'title' => 'Salon Principal',
                    'description' => 'Un espace de vie spacieux et lumineux de 35m² avec vue panoramique sur le jardin.'
                ],
                'hotspots' => [
                    [
                        'position' => ['x' => 200, 'y' => 0, 'z' => 100],
                        'type' => 'navigation',
                        'label' => 'Aller à la cuisine',
                        'target' => 'cuisine'
                    ],
                    [
                        'position' => ['x' => -150, 'y' => 50, 'z' => -200],
                        'type' => 'info',
                        'label' => 'Caractéristiques du salon',
                        'content' => [
                            'title' => 'Salon moderne',
                            'description' => 'Parquet en chêne massif, grandes baies vitrées, système de chauffage au sol.',
                            'details' => '<ul><li>Surface: 35m²</li><li>Hauteur sous plafond: 3m</li><li>Orientation: Sud</li></ul>'
                        ]
                    ],
                    [
                        'position' => ['x' => 100, 'y' => -50, 'z' => 250],
                        'type' => 'navigation',
                        'label' => 'Vers la chambre',
                        'target' => 'chambre'
                    ]
                ]
            ],
            
            'cuisine' => [
                'name' => 'Cuisine',
                'image' => '/images/panorama6.jpg',
                'info' => [
                    'title' => 'Cuisine Équipée',
                    'description' => 'Cuisine moderne entièrement équipée avec îlot central et électroménager haut de gamme.'
                ],
                'hotspots' => [
                    [
                        'position' => ['x' => -200, 'y' => 0, 'z' => -100],
                        'type' => 'navigation',
                        'label' => 'Retour au salon',
                        'target' => 'salon'
                    ],
                    [
                        'position' => ['x' => 0, 'y' => 30, 'z' => 200],
                        'type' => 'info',
                        'label' => 'Équipements',
                        'content' => [
                            'title' => 'Équipements de cuisine',
                            'description' => 'Tous les appareils sont de marque premium avec garantie 5 ans.',
                            'details' => '<ul><li>Four encastrable</li><li>Plaque induction</li><li>Lave-vaisselle</li><li>Réfrigérateur américain</li></ul>'
                        ]
                    ],
                    [
                        'position' => ['x' => 150, 'y' => 0, 'z' => -150],
                        'type' => 'media',
                        'label' => 'Voir la vidéo',
                        'content' => [
                            'type' => 'youtube',
                            'title' => 'Visite guidée de la cuisine',
                            'videoId' => 'dQw4w9WgXcQ',
                            'description' => 'Découvrez tous les détails de cette cuisine moderne.'
                        ]
                    ]
                ]
            ],
            
            'chambre' => [
                'name' => 'Chambre Principale',
                'image' => '/images/panorama3.jpg',
                'info' => [
                    'title' => 'Chambre Principale',
                    'description' => 'Grande chambre avec dressing intégré et salle de bain privative.'
                ],
                'hotspots' => [
                    [
                        'position' => ['x' => -100, 'y' => 0, 'z' => -250],
                        'type' => 'navigation',
                        'label' => 'Retour au salon',
                        'target' => 'salon'
                    ],
                    [
                        'position' => ['x' => 200, 'y' => 0, 'z' => 50],
                        'type' => 'navigation',
                        'label' => 'Salle de bain',
                        'target' => 'salle_bain'
                    ],
                    [
                        'position' => ['x' => 0, 'y' => 60, 'z' => 180],
                        'type' => 'media',
                        'label' => 'Photo du dressing',
                        'content' => [
                            'type' => 'image',
                            'title' => 'Dressing sur mesure',
                            'url' => '/images/dressing.jpg',
                            'description' => 'Dressing sur mesure de 8m² avec éclairage LED.'
                        ]
                    ]
                ]
            ],
            
            'salle_bain' => [
                'name' => 'Salle de Bain',
                'image' => '/images/panorama4.jpg',
                'info' => [
                    'title' => 'Salle de Bain',
                    'description' => 'Salle de bain moderne avec douche italienne et double vasque.'
                ],
                'hotspots' => [
                    [
                        'position' => ['x' => -200, 'y' => 0, 'z' => 0],
                        'type' => 'navigation',
                        'label' => 'Retour à la chambre',
                        'target' => 'chambre'
                    ],
                    [
                        'position' => ['x' => 100, 'y' => 20, 'z' => -200],
                        'type' => 'info',
                        'label' => 'Équipements sanitaires',
                        'content' => [
                            'title' => 'Installations premium',
                            'description' => 'Tous les équipements sont de haute qualité.',
                            'details' => '<ul><li>Douche italienne 120x90cm</li><li>Double vasque</li><li>WC suspendu</li><li>Sèche-serviette électrique</li></ul>'
                        ]
                    ]
                ]
            ]
        ];

        return view('virtual-tour', compact('tourConfig', 'panoramas'));
    }

    /**
     * Show a specific panorama (API endpoint)
     */
    public function getPanorama($id)
    {
        // Récupérer les données d'un panorama spécifique
        // Utile pour le chargement dynamique
        
        return response()->json([
            'success' => true,
            'panorama' => [
                'id' => $id,
                'image' => 'storage/panoramas/panorama' . $id . '.jpg',
                // ... autres données
            ]
        ]);
    }

    /**
     * Get all panoramas (API endpoint)
     */
    public function getAllPanoramas()
    {
        // Retourner tous les panoramas disponibles
        // Utile pour les applications qui chargent les données dynamiquement
        
        return response()->json([
            'success' => true,
            'panoramas' => [
                // Liste des panoramas
            ]
        ]);
    }

    /**
     * Save tour configuration
     */
    public function saveConfiguration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'panoramas' => 'required|array',
            'config' => 'required|array',
        ]);

        // Sauvegarder la configuration dans la base de données
        // ou dans un fichier JSON

        return response()->json([
            'success' => true,
            'message' => 'Configuration sauvegardée avec succès'
        ]);
    }

    /**
     * Example with database integration
     */
    public function showFromDatabase($tourId)
    {
        // Si vous utilisez une base de données
        // $tour = Tour::with('panoramas.hotspots')->findOrFail($tourId);
        
        // $tourConfig = [
        //     'startPanorama' => $tour->start_panorama,
        //     'autoRotate' => $tour->auto_rotate,
        //     // ...
        // ];
        
        // $panoramas = $tour->panoramas->map(function($panorama) {
        //     return [
        //         'name' => $panorama->name,
        //         'image' => $panorama->image_path,
        //         'info' => json_decode($panorama->info),
        //         'hotspots' => $panorama->hotspots->map(function($hotspot) {
        //             return [
        //                 'position' => json_decode($hotspot->position),
        //                 'type' => $hotspot->type,
        //                 'label' => $hotspot->label,
        //                 'target' => $hotspot->target,
        //                 'content' => json_decode($hotspot->content)
        //             ];
        //         })->toArray()
        //     ];
        // })->toArray();
        
        // return view('virtual-tour', compact('tourConfig', 'panoramas'));
    }
}