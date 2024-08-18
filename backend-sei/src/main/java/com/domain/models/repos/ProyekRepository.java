package com.domain.models.repos;
import org.springframework.data.jpa.repository.JpaRepository;
import com.domain.models.entities.Proyek;

public interface ProyekRepository extends JpaRepository<Proyek, Integer> {
}