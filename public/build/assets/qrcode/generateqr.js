// const qrcode = require('qrcode');
import qrcode from 'qrcode';
const generateQRCode = async (userID, eventID, outputPath) => {
    try {
        const text = `UserID: ${userID}, EventID: ${eventID}`;
        await qrcode.toFile(outputPath, text);
        console.log('QR code generated successfully:', outputPath);
    } catch (error) {
        console.error('Error generating QR code:', error);
    }
};

// Example usage
generateQRCode(123, 456, 'user-event-qrcode.png');
