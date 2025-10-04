// server.js
import express from "express";
import http from "http";
import { WebSocketServer } from "ws";
import dotenv from "dotenv";

dotenv.config();
// dotenv.config({ path: "../.env" });

const app = express();
const server = http.createServer(app);
const wss = new WebSocketServer({ server, path: "/ws" });

const PORT = process.env.WS_PORT || 3000;

// WebSocket
wss.on("connection", (ws) => {
    console.log("Cliente conectado ✅");
    ws.send("Hola desde WebSocket (Node.js)");

    ws.on("message", (msg) => {
        console.log("Mensaje recibido:", msg.toString());
    });
});

// Arrancar servidor
server.listen(PORT, () => {
    console.log(`Servidor WS escuchando en ws://localhost:${PORT}`);
});

// Ejemplo: conexión a DB con pg
import pkg from "pg";
const { Pool } = pkg;

const pool = new Pool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASS,
    database: process.env.DB_NAME,
});

pool.query("SELECT NOW()", (err, res) => {
    if (err) console.error(err);
    else console.log("Hora desde PostgreSQL:", res.rows[0].now);
});