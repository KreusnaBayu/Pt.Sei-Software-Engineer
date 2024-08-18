package com.domain.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.domain.models.entities.Lokasi;

public interface LokasiRepository extends JpaRepository<Lokasi, Integer> {
}