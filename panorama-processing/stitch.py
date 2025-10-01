# stitch.py
import cv2
import os

input_folder = 'storage/app/public/panoramas'
output_file = 'storage/app/public/panoramas/generated_panorama.jpg'

images = []
for filename in sorted(os.listdir(input_folder)):
    if filename.endswith('.jpg'):
        img = cv2.imread(os.path.join(input_folder, filename))
        if img is not None:
            images.append(img)

if len(images) < 2:
    print("Pas assez d’images pour créer un panorama.")
    exit()

stitcher = cv2.Stitcher_create(cv2.Stitcher_PANORAMA)
status, pano = stitcher.stitch(images)

if status == cv2.Stitcher_OK:
    cv2.imwrite(output_file, pano)
    print("✅ Panorama créé avec succès :", output_file)
else:
    print("❌ Erreur lors de l’assemblage :", status)
