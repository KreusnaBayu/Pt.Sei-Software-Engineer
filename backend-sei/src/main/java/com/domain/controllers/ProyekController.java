package com.domain.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import com.domain.models.entities.Lokasi;
import com.domain.models.entities.Proyek;
import com.domain.models.repos.LokasiRepository;
import com.domain.models.repos.ProyekRepository;

import lombok.Data;
import lombok.NoArgsConstructor;

import java.sql.Timestamp;
import java.util.HashSet;
import java.util.Optional;
import java.util.Set;

@RestController
@RequestMapping("/proyek")
public class ProyekController {

    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public ResponseEntity<Proyek> createProyek(@RequestBody ProyekRequest proyek) {
        
        Proyek newProyek = new Proyek();
        newProyek.setNamaProyek(proyek.getNamaProyek());
        newProyek.setClient(proyek.getClient());
        newProyek.setTglMulai(proyek.getTglMulai());
        newProyek.setTglSelesai(proyek.getTglSelesai());
        newProyek.setPimpinanProyek(proyek.getPimpinanProyek());
        newProyek.setKeterangan(proyek.getKeterangan());
        
        Set<Lokasi>newlokasi = new HashSet <> ();
        Optional<Lokasi> existingLokasi = lokasiRepository.findById(proyek.getLokasi());
        existingLokasi.ifPresent(newlokasi::add);

        newProyek.setLokasi(newlokasi);
        proyekRepository.save(newProyek);
        return ResponseEntity.ok(newProyek);
    }


    @GetMapping
    public ResponseEntity<Set<Proyek>> getAllProyek() {
        Set<Proyek> proyekSet = new HashSet<>();
        proyekRepository.findAll().forEach(proyekSet::add);
        return ResponseEntity.ok(proyekSet);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Integer id, @RequestBody ProyekRequest proyek) {
        Optional<Proyek> existingProyekOpt = proyekRepository.findById(id);
        
        if (!existingProyekOpt.isPresent()) {
            return ResponseEntity.notFound().build();
        }
        
        Proyek existingProyek = existingProyekOpt.get();
        
        existingProyek.setNamaProyek(proyek.getNamaProyek());
        existingProyek.setClient(proyek.getClient());
        existingProyek.setTglMulai(proyek.getTglMulai());
        existingProyek.setTglSelesai(proyek.getTglSelesai());
        existingProyek.setPimpinanProyek(proyek.getPimpinanProyek());
        existingProyek.setKeterangan(proyek.getKeterangan());
        
        // Update Lokasi jika ada
        if (proyek.getLokasi() != null) {
            Set<Lokasi> lokasiSet = new HashSet<>();
            Optional<Lokasi> existingLokasi = lokasiRepository.findById(proyek.getLokasi());
            existingLokasi.ifPresent(lokasiSet::add);
            existingProyek.setLokasi(lokasiSet);
        }
        
        Proyek updatedProyek = proyekRepository.save(existingProyek);
        return ResponseEntity.ok(updatedProyek);
    }
    

    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteProyek(@PathVariable Integer id) {
        if (!proyekRepository.existsById(id)) {
            return ResponseEntity.status(404).body("{\"message\": \"Proyek dengan ID " + id + " tidak ditemukan.\"}");
        }
        proyekRepository.deleteById(id);
        return ResponseEntity.status(200).body("{\"message\": \"Proyek dengan ID " + id + " berhasil dihapus.\"}");
    }

    @GetMapping("/{id}")
    public ResponseEntity<Proyek> getidProyek (@PathVariable Integer id){
        return ResponseEntity.ok(proyekRepository.findById(id).orElse(null));
    }

    @Data
    @NoArgsConstructor
    public static class ProyekRequest {
        private Integer id;

        private String namaProyek;
        private String client;
        private Timestamp tglMulai;
        private Timestamp tglSelesai;
        private String pimpinanProyek;
        private String keterangan;
        private Integer lokasi;
        
    }
}
