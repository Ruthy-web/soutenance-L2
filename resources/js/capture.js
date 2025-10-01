let stream;
let lastAngle = null;
let lastCaptureTime = 0;
let photoCount = 0;
const maxPhotos = 36; // pour couvrir 360° avec 10° d'écart
const rotationThreshold = 10; // plus sensible
const minDelay = 800;
const capturedImages = [];

const video = document.getElementById('preview');
const guide = document.getElementById('guide');
const startBtn = document.getElementById('startBtn');
const gallery = document.getElementById('gallery');

startBtn.addEventListener('click', async () => {
  startBtn.disabled = true;
  guide.innerText = 'Initialisation de la caméra…';

  try {
    stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' }, audio: false });
    video.srcObject = stream;
    guide.innerText = 'Tournez lentement sur 360°…';

    window.addEventListener('deviceorientation', handleRotation);
  } catch (err) {
    console.error('Erreur caméra :', err);
    guide.innerText = 'Impossible d’accéder à la caméra.';
  }
});

function handleRotation(event) {
  const now = Date.now();
  const angle = Math.round(event.alpha); // 0 à 360°

  if ((lastAngle === null || Math.abs(angle - lastAngle) >= rotationThreshold) &&
      (now - lastCaptureTime > minDelay)) {
    capturePhoto(angle);
    lastAngle = angle;
    lastCaptureTime = now;
    photoCount++;

    guide.innerText = `Capture ${photoCount}/${maxPhotos} — Angle ${angle}°`;

    if (photoCount >= maxPhotos) {
      guide.innerText = 'Capture terminée !';
      window.removeEventListener('deviceorientation', handleRotation);
      stream.getTracks().forEach(track => track.stop());
      sendImagesToServer();
    }
  }
}

function capturePhoto(angle) {
  const canvas = document.createElement('canvas');
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  const ctx = canvas.getContext('2d');
  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
  const imageData = canvas.toDataURL('image/jpeg');
  capturedImages.push({ angle, dataUrl: imageData });

  const img = document.createElement('img');
  img.src = imageData;
  img.title = `Angle ${angle}°`;
  gallery.appendChild(img);
}

function sendImagesToServer() {
  guide.innerText = 'Envoi des images pour assemblage panoramique…';

  const formData = new FormData();
  capturedImages.forEach(({ dataUrl, angle }, index) => {
    const blob = dataURItoBlob(dataUrl);
    formData.append(`photo_${index}`, blob, `photo_${angle}.jpg`);
  });

  fetch('/assemble-panorama', {
    method: 'POST',
    body: formData,
  }).then(res => {
    if (res.ok) {
      guide.innerText = 'Panorama généré avec succès !';
    } else {
      guide.innerText = 'Erreur lors de l’envoi.';
    }
  });
}

function dataURItoBlob(dataURI) {
  const byteString = atob(dataURI.split(',')[1]);
  const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
  const ab = new ArrayBuffer(byteString.length);
  const ia = new Uint8Array(ab);
  for (let i = 0; i < byteString.length; i++) {
    ia[i] = byteString.charCodeAt(i);
  }
  return new Blob([ab], { type: mimeString });
}
