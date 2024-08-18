package com.domain.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import com.domain.models.entities.Lokasi;
import com.domain.models.repos.LokasiRepository;

import java.sql.Timestamp;
import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Lokasi createLokasi(@RequestBody Lokasi lokasi) {
        lokasi.setCreatedAt(new Timestamp(System.currentTimeMillis())); // Set timestamp saat pembuatan jika perlu
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Lokasi> getById(@PathVariable Integer id) {
        Optional<Lokasi> lokasi = lokasiRepository.findById(id);
        if (lokasi.isPresent()) {
            return ResponseEntity.ok(lokasi.get());
        } else {
            return ResponseEntity.status(HttpStatus.NOT_FOUND).build();
        }
    }

    @PutMapping("/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable Integer id, @RequestBody Lokasi lokasiDetails) {
        Optional<Lokasi> existingLokasi = lokasiRepository.findById(id);
        if (!existingLokasi.isPresent()) {
            return ResponseEntity.notFound().build();
        }

        Lokasi lokasi = existingLokasi.get();
        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setNegara(lokasiDetails.getNegara());
        lokasi.setProvinsi(lokasiDetails.getProvinsi());
        lokasi.setKota(lokasiDetails.getKota());

        Lokasi updatedLokasi = lokasiRepository.save(lokasi);
        return ResponseEntity.ok(updatedLokasi);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteLokasi(@PathVariable Integer id) {
        Optional<Lokasi> lokasi = lokasiRepository.findById(id);
        if (!lokasi.isPresent()) {
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("{\"message\": \"Lokasi dengan ID " + id + " tidak ditemukan.\"}");
        }

        lokasiRepository.delete(lokasi.get());
        return ResponseEntity.status(HttpStatus.OK).body("{\"message\": \"Lokasi dengan ID " + id + " berhasil dihapus.\"}");
    }
}