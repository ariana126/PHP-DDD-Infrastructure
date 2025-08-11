# 🏗 PHP DDD Infrastructure

A lightweight **starter toolkit** for building Domain-Driven Design (DDD) applications in PHP.  
It provides base classes and patterns such as **Value Object**, **Entity**, **Aggregate Root**, and **Domain Event**, etc., plus optional helpers for **Doctrine ORM** and **Symfony**.

This is not a framework — it’s a **foundation** you can integrate into **any PHP project**, regardless of framework choice (Laravel, Symfony, Slim, or even vanilla PHP).

---

## ✨ Features

- 📦 **Framework-agnostic** — works anywhere PHP does.
- 🧱 Base classes for:
    - Entities
    - Value Objects (with equality checks)
    - Aggregate Roots (with domain event recording)
    - Domain Events
    - CQRS
- 🗄 Optional **Doctrine ORM** integration.
- ⚙ Optional **Symfony** integration.
- 🛠 Designed for **clean architecture** & **hexagonal principles**.

Keep in mind, any classes in this package is optional. You can make use of the Aggregate Root base class and drop everything else. You can implement all interfaces as you like or don't even include them at all.