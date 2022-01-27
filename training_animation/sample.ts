import * as THREE from "three";
import GLTFLoader from "three-gltf-loader";
import OrbitControls from "three-orbitcontrols";

// 幅、高さ取得
const width = window.innerWidth;
const height = window.innerHeight;

// レンダラの作成、DOMに追加
const renderer = new THREE.WebGLRenderer();
renderer.setSize(width, height);
renderer.setClearColor(0xf6f6f6, 1.0);
document.body.appendChild(renderer.domElement);

// シーンの作成、ライトの作成と追加
const scene = new THREE.Scene();
scene.add(new THREE.AmbientLight(0xffffff, 1));

// カメラの作成と追加、OrbitControlsの追加
const camera = new THREE.PerspectiveCamera(45, width / height, 1, 100);
camera.position.set(0, 1, -3);
const controls = new OrbitControls(camera, renderer.domElement);
controls.target.set(0, 1, 0);
controls.update();

// VRMのファイルをロード
new GLTFLoader().load("vrm/Victoria_Rubin.vrm", (data) => {
    scene.add(data.scene);
});

// レンダリング
const render = () => {
    renderer.render(scene, camera);
    requestAnimationFrame(render);
};
render();