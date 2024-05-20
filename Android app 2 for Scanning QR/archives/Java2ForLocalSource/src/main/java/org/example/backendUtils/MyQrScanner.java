package org.example.backendUtils;

import com.google.zxing.NotFoundException;
import com.google.zxing.BinaryBitmap;
import com.google.zxing.LuminanceSource;
import com.google.zxing.MultiFormatReader;
import com.google.zxing.Result;
import com.google.zxing.client.j2se.BufferedImageLuminanceSource;
import com.google.zxing.common.HybridBinarizer;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;

public class MyQrScanner {
    private String readQrFromFile(String filePath){
        try{
            // Load QR code image from file
            BufferedImage image = ImageIO.read(new File(filePath));

            // Convert the image to a LuminanceSource
            LuminanceSource source = new BufferedImageLuminanceSource(image);
            BinaryBitmap bitmap = new BinaryBitmap(new HybridBinarizer(source));

            // Initialize the MultiFormatReader
            MultiFormatReader reader = new MultiFormatReader();

            // Decode the QR code
            Result result = reader.decode(bitmap);
            return result.getText();
        }
        catch (Exception e){
            e.printStackTrace();
            System.err.println("execution stopped while invoking readQrFromFile");
        }
        return "";
    }
    public String[] readQR(String filePath){
        String ans=readQrFromFile(filePath);
        String[] res=ans.split(" ");
        return res;
    }
//    public static void main(String[] args) {
//        // Path to the QR code image file
//        String filePath = "D:\\Laravell project under ashish sir\\my local repo\\project_laravel\\Android app 2 for Scanning QR\\Java2ForLocalSource\\src\\main\\java\\org\\example\\backendUtils\\qrs for testing\\qr1.jpg";
//        String[] ans=new MyQrScanner().readQR(filePath);
//        System.out.println(ans[0]+"\n"+ans[1]);
//    }
}
