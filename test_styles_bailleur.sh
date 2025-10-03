#!/bin/bash

echo "🎨 CORRECTION DES STYLES - DASHBOARD BAILLEUR"
echo "============================================="

# Couleurs
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

echo -e "\n${BLUE}🔧 CORRECTIONS APPORTÉES:${NC}"
echo "✅ Ajout de @vite(['resources/css/app.css', 'resources/js/app.js'])"
echo "✅ jQuery chargé avant Livewire"
echo "✅ Assets Vite compilés avec npm run dev"
echo "✅ Ordre des scripts corrigé"

echo -e "\n${YELLOW}📋 ÉTAPES POUR TESTER:${NC}"
echo "1. Connectez-vous avec: bailleur@test.com / password"
echo "2. Accédez à http://localhost:8000/bailleur"
echo "3. Vérifiez que les styles s'appliquent correctement"

echo -e "\n${YELLOW}🧪 TEST AUTOMATIQUE:${NC}"

# Vérifier que le serveur Vite fonctionne
if curl -s http://localhost:5173 > /dev/null 2>&1; then
    echo -e "${GREEN}✅ Serveur Vite actif (port 5173)${NC}"
else
    echo -e "${RED}❌ Serveur Vite non démarré${NC}"
    echo "   Lancez: npm run dev"
fi

# Vérifier que le serveur Laravel fonctionne
status=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8000/login)
if [ "$status" = "200" ]; then
    echo -e "${GREEN}✅ Serveur Laravel actif (port 8000)${NC}"
else
    echo -e "${RED}❌ Serveur Laravel non démarré${NC}"
    echo "   Lancez: php artisan serve"
fi

echo -e "\n${BLUE}🔍 VÉRIFICATIONS DANS LE NAVIGATEUR:${NC}"
echo "1. Ouvrez les DevTools (F12)"
echo "2. Onglet Console - Plus d'erreur '$ is not defined'"
echo "3. Onglet Network - Assets Vite chargés"
echo "4. Styles Bootstrap appliqués"

echo -e "\n${GREEN}🎉 LE DASHBOARD BAILLEUR DEVRAIT MAINTENANT AVOIR SES STYLES !${NC}"
