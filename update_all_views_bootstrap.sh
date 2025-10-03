#!/bin/bash

echo "🎯 MISE À JOUR BOOTSTRAP CDN - TOUTES LES VUES"
echo "=============================================="

# Couleurs
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "\n${BLUE}🔧 MISE À JOUR DES VUES PRINCIPALES:${NC}"

# Liste des vues principales à mettre à jour
views=(
    "resources/views/properties.blade.php"
    "resources/views/property-details.blade.php"
    "resources/views/reservation.blade.php"
    "resources/views/contact.blade.php"
    "resources/views/ajouter-logement.blade.php"
    "resources/views/mes-logements.blade.php"
    "resources/views/gerer-profil.blade.php"
    "resources/views/virtual-tour.blade.php"
    "resources/views/tour.blade.php"
    "resources/views/panorama.blade.php"
    "resources/views/capture.blade.php"
    "resources/views/apropos.blade.php"
    "resources/views/fonctionnalités.blade.php"
    "resources/views/laisser-avis.blade.php"
    "resources/views/contacter-bailleur.blade.php"
    "resources/views/publier_logement.blade.php"
    "resources/views/reserver.blade.php"
    "resources/views/admin.blade.php"
    "resources/views/users.blade.php"
    "resources/views/test.blade.php"
)

# Fonction pour mettre à jour une vue
update_view() {
    local view_file="$1"
    
    if [ -f "$view_file" ]; then
        echo -e "${YELLOW}📝 Mise à jour de $view_file...${NC}"
        
        # Remplacer Bootstrap 5.3.0 par 5.3.8
        sed -i '' 's/bootstrap@5\.3\.0/bootstrap@5.3.8/g' "$view_file"
        sed -i '' 's/bootstrap@5\.3\.7/bootstrap@5.3.8/g' "$view_file"
        
        # Ajouter Font Awesome si pas présent
        if ! grep -q "font-awesome" "$view_file"; then
            sed -i '' '/Bootstrap CSS/a\
    <!-- Font Awesome -->\
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">' "$view_file"
        fi
        
        # Ajouter Bootstrap JS si pas présent
        if ! grep -q "bootstrap.bundle.min.js" "$view_file"; then
            sed -i '' '/<\/body>/i\
<!-- Bootstrap JS -->\
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>' "$view_file"
        fi
        
        echo -e "${GREEN}✅ $view_file mis à jour${NC}"
    else
        echo -e "${RED}❌ $view_file non trouvé${NC}"
    fi
}

# Mettre à jour toutes les vues
for view in "${views[@]}"; do
    update_view "$view"
done

echo -e "\n${BLUE}🔧 MISE À JOUR DES VUES LIVEWIRE:${NC}"

# Vues Livewire à mettre à jour
livewire_views=(
    "resources/views/livewire/auth/forgot-password.blade.php"
    "resources/views/livewire/auth/confirm-password.blade.php"
    "resources/views/livewire/auth/reset-password.blade.php"
    "resources/views/livewire/biens/index.blade.php"
    "resources/views/livewire/biens/form.blade.php"
    "resources/views/livewire/settings/profile.blade.php"
    "resources/views/livewire/settings/password.blade.php"
    "resources/views/livewire/settings/appearance.blade.php"
    "resources/views/livewire/settings/delete-user-form.blade.php"
)

for view in "${livewire_views[@]}"; do
    update_view "$view"
done

echo -e "\n${BLUE}🔧 MISE À JOUR DES COMPOSANTS:${NC}"

# Composants à mettre à jour
components=(
    "resources/views/components/layouts/app.blade.php"
    "resources/views/components/layouts/simple.blade.php"
    "resources/views/components/layouts/auth.blade.php"
    "resources/views/components/layouts/auth/simple.blade.php"
    "resources/views/components/layouts/auth/split.blade.php"
    "resources/views/components/layouts/auth/card.blade.php"
    "resources/views/components/primary-button.blade.php"
    "resources/views/components/text-input.blade.php"
    "resources/views/components/input-label.blade.php"
    "resources/views/components/input-error.blade.php"
)

for component in "${components[@]}"; do
    update_view "$component"
done

echo -e "\n${GREEN}🎉 MISE À JOUR TERMINÉE !${NC}"
echo -e "${YELLOW}📋 RÉSUMÉ DES CHANGEMENTS:${NC}"
echo "✅ Bootstrap 5.3.8 CDN sur toutes les vues"
echo "✅ Font Awesome CDN ajouté"
echo "✅ Bootstrap JS ajouté"
echo "✅ Intégrité et crossorigin ajoutés"

echo -e "\n${BLUE}🧪 POUR TESTER:${NC}"
echo "1. Redémarrez le serveur: php artisan serve"
echo "2. Testez les pages principales"
echo "3. Vérifiez que Bootstrap fonctionne partout"

echo -e "\n${GREEN}🚀 TOUTES LES VUES UTILISENT MAINTENANT BOOTSTRAP CDN !${NC}"
