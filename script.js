document.addEventListener("DOMContentLoaded", function () {
    // Datos de ejemplo
    const projects = [
        { id: 1, name: "Proyecto Agua Limpia", description: "Proporciona acceso a agua potable a comunidades rurales." },
        { id: 2, name: "Educación para Todos", description: "Programa de educación para niños en zonas desfavorecidas." }
    ];

    const events = [
        { id: 1, name: "Maratón solidaria", date: "2024-09-15" },
        { id: 2, name: "Cena benéfica", date: "2024-10-01" }
    ];

    const notifications = [
        "¡Hemos alcanzado el 50% de nuestra meta de recaudación!",
        "Nuevo proyecto lanzado: 'Educación para Todos'"
    ];

    // Mostrar notificaciones
    const notificationsContainer = document.getElementById("notifications-container");
    notifications.forEach(notification => {
        const notificationElement = document.createElement("p");
        notificationElement.textContent = notification;
        notificationsContainer.appendChild(notificationElement);
    });

    // Mostrar proyectos
    const projectsContainer = document.getElementById("projects-container");
    projects.forEach(project => {
        const projectElement = document.createElement("div");
        projectElement.classList.add("project");
        projectElement.innerHTML = `<h3>${project.name}</h3><p>${project.description}</p>`;
        projectsContainer.appendChild(projectElement);
    });

    // Función de búsqueda
    window.search = function () {
        const query = document.getElementById("events").value.toLowerCase();
        const resultsContainer = document.getElementById("results-container");
        resultsContainer.innerHTML = ""; // Limpiar resultados anteriores

        const filteredEvents = events.filter(event => event.name.toLowerCase().includes(query));

        if (filteredEvents.length > 0) {
            filteredEvents.forEach(event => {
                const eventElement = document.createElement("div");
                eventElement.classList.add("event");
                eventElement.innerHTML = `<h3>${event.name}</h3><p>Fecha: ${event.date}</p>`;
                resultsContainer.appendChild(eventElement);
            });
        } else {
            resultsContainer.innerHTML = "<p>No se encontraron eventos.</p>";
        }
    };
});

// Clase Proyecto
class Proyecto {
    constructor(id, nombre, descripcion, metaRecaudacion, fondosRecaudados = 0) {
        this.id = id;
        this.nombre = nombre;
        this.descripcion = descripcion;
        this.metaRecaudacion = metaRecaudacion;
        this.fondosRecaudados = fondosRecaudados;
    }

    // Método para actualizar los fondos recaudados
    actualizarFondos(monto) {
        this.fondosRecaudados += monto;
    }

    // Método para obtener el progreso de recaudación
    obtenerProgreso() {
        return (this.fondosRecaudados / this.metaRecaudacion) * 100;
    }

    // Método para mostrar la información del proyecto
    mostrarInfo() {
        return `<h3>${this.nombre}</h3>
                <p>${this.descripcion}</p>
                <p>Meta de Recaudación: $${this.metaRecaudacion.toLocaleString()}</p>
                <p>Fondos Recaudados: $${this.fondosRecaudados.toLocaleString()} (${this.obtenerProgreso().toFixed(2)}% completado)</p>`;
    }
}

// Clase Evento
class Evento {
    constructor(id, nombre, fecha) {
        this.id = id;
        this.nombre = nombre;
        this.fecha = fecha;
    }

    // Método para mostrar la información del evento
    mostrarInfo() {
        return `<h3>${this.nombre}</h3>
                <p>Fecha: ${this.fecha}</p>`;
    }
}

// Clase Donacion
class Donacion {
    constructor(id, donante, monto, proyecto) {
        this.id = id;
        this.donante = donante;
        this.monto = monto;
        this.proyecto = proyecto;
    }

    // Método para procesar la donación
    procesar() {
        this.proyecto.actualizarFondos(this.monto);
        return `Gracias, ${this.donante}, por tu donación de $${this.monto.toLocaleString()} al proyecto "${this.proyecto.nombre}"`;
    }
}

// Crear proyectos
const proyectoAguaLimpia = new Proyecto(1, "Proyecto Agua Limpia", "Proporciona acceso a agua potable a comunidades rurales.", 50000);
const proyectoEducacion = new Proyecto(2, "Educación para Todos", "Programa de educación para niños en zonas desfavorecidas.", 75000);

// Crear eventos
const eventoMaraton = new Evento(1, "Maratón solidaria", "2024-09-15");
const eventoCena = new Evento(2, "Cena benéfica", "2024-10-01");

// Crear donaciones
const donacion1 = new Donacion(1, "Carlos Pérez", 1000, proyectoAguaLimpia);
const donacion2 = new Donacion(2, "Ana Gómez", 1500, proyectoEducacion);

// Procesar donaciones
console.log(donacion1.procesar());
console.log(donacion2.procesar());

// Mostrar información de los proyectos
console.log(proyectoAguaLimpia.mostrarInfo());
console.log(proyectoEducacion.mostrarInfo());

// Mostrar información de los eventos
console.log(eventoMaraton.mostrarInfo());
console.log(eventoCena.mostrarInfo());

// Mostrar en la página web
document.addEventListener("DOMContentLoaded", function () {
    const projectsContainer = document.getElementById("projects-container");
    projectsContainer.innerHTML += proyectoAguaLimpia.mostrarInfo();
    projectsContainer.innerHTML += proyectoEducacion.mostrarInfo();

    const resultsContainer = document.getElementById("results-container");
    resultsContainer.innerHTML += eventoMaraton.mostrarInfo();
    resultsContainer.innerHTML += eventoCena.mostrarInfo();
});

document.addEventListener("DOMContentLoaded", function () {
    // Contenedor para las notificaciones
    const notificationsContainer = document.getElementById("notifications-container");

    // Simulación de actualización periódica de donaciones y notificaciones
    setInterval(function () {
        // Actualización de progreso de un proyecto (simulación)
        const donacionAleatoria = Math.floor(Math.random() * 500) + 100;
        proyectoAguaLimpia.actualizarFondos(donacionAleatoria);

        // Crear una notificación sobre el progreso
        const notification = document.createElement("p");
        notification.textContent = `¡Se han donado $${donacionAleatoria.toLocaleString()} al proyecto "${proyectoAguaLimpia.nombre}"! Progreso: ${proyectoAguaLimpia.obtenerProgreso().toFixed(2)}%`;
        notificationsContainer.appendChild(notification);

        // Limpiar notificaciones antiguas después de un tiempo
        setTimeout(() => {
            notification.remove();
        }, 10000); // 10 segundos

    }, 5000); // Cada 5 segundos

    // Evento personalizado para logros alcanzados
    function mostrarLogro(logro) {
        const logroNotification = document.createElement("p");
        logroNotification.textContent = `¡Logro alcanzado! ${logro}`;
        logroNotification.style.fontWeight = "bold";
        logroNotification.style.color = "green";
        notificationsContainer.appendChild(logroNotification);

        setTimeout(() => {
            logroNotification.remove();
        }, 15000); // 15 segundos
    }

    // Simulación de alcanzar un logro (meta de recaudación del 50%)
    setInterval(function () {
        if (proyectoAguaLimpia.obtenerProgreso() >= 50) {
            mostrarLogro(`El proyecto "${proyectoAguaLimpia.nombre}" ha alcanzado el 50% de su meta de recaudación.`);
        }
    }, 10000); // Verificar cada 10 segundos

    // Evento personalizado para campañas en curso
    function mostrarCampaña(campaña) {
        const campañaNotification = document.createElement("p");
        campañaNotification.textContent = `Campaña en curso: ${campaña}`;
        campañaNotification.style.fontWeight = "bold";
        campañaNotification.style.color = "blue";
        notificationsContainer.appendChild(campañaNotification);

        setTimeout(() => {
            campañaNotification.remove();
        }, 20000); // 20 segundos
    }

    // Simulación de campañas en curso
    setInterval(function () {
        const campañas = ["Campaña de Invierno", "Recaudación Especial para Educación", "Maratón solidaria"];
        const campañaAleatoria = campañas[Math.floor(Math.random() * campañas.length)];
        mostrarCampaña(campañaAleatoria);
    }, 15000); // Cada 15 segundos

});

